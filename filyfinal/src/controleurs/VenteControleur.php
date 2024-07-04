<?php
namespace GAC\Controleurs;

use GAC\Model\Users;
use GAC\Model\Vente;
use GAC\Core\Session;
use GAC\Model\Panier;
use GAC\Model\Article;
use GAC\Core\controleur;
use GAC\Core\Autorisation;

    class  VenteControleur extends  controleur{
        private Vente $vente;
        private Article $articles;
        private Users $user ;

        public function __construct()
        {
            parent::__construct();
            if (!Autorisation::isConnect()) {
                parent::redirection("?controleur=securite&action=show-form");
            }
            $this->vente= new Vente();
            $this->articles= new Article(); 
            $this->user= new Users(); 
            $this->load();
        }
        public function load() {
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"] == "liste-vente") {
                    // Vérifiez et utilisez $_REQUEST["page"] si défini
                    $page = isset($_REQUEST["page"]) ? (int)$_REQUEST["page"] : 0;
                    $this->listerVente($page);
                } elseif ($_REQUEST["action"] == "form-vente") {
                    $this->ChargeForm();
                } elseif ($_REQUEST["action"] == "add-articleVente") {
                    $this->AddArticleVente($_POST);
                } elseif ($_REQUEST["action"] == "add-vente") {
                    $this->save();
                }
            } else {
                // Vérifiez et utilisez $_REQUEST["page"] si défini
                $page = isset($_REQUEST["page"]) ? (int)$_REQUEST["page"] : 0;
                $this->listerVente($page);
            }
        }
        

        public function listerVente(int $page=0){
            $ventes=$this->vente->findAll($page,OFFSET);
            $this->renderView("ventes/liste",["ventes"=>$ventes,"currentPage"=>$page]);
        }
        public function ChargeForm(){
            $ArticleTypes = $this->articles->trieArticle("article de vente");
            $clientTitres = $this->user->findAll();
            $clients=[];
            foreach ($clientTitres as $value) {
                if ($value["nomRole"]=="Client") {
                    $clients[]=$value;
                }
            }           
            $this->renderView("ventes/form",["clients"=>$clients,"ArticleTypes"=>$ArticleTypes]);
        }
        public function AddArticleVente(array $data) {
            // Assurez-vous que les indices nécessaires sont définis dans $data
            if (isset($data["idArticle"], $data["idClient"], $data["qte"])) {
                if (Session::getSession("panier") == false) {
                    $panier = new Panier();
                } else {
                    $panier = Session::getSession("panier");
                }
                $article = $this->articles->findById($data["idArticle"]);
                if (!empty($article)) {
                    $panier->AddArticle($article[0], $data["idClient"], $data["qte"]);
                    Session::AddSession("panier", $panier);
                } else {
                    // Gérer le cas où $article est vide ou non trouvé
                }
            } else {
                // Gérer le cas où $data["idArticle"], $data["idClient"], ou $data["qte"] n'est pas défini
            }
            $this->redirection("?controleur=vente&action=form-vente");
        }
        public  function save(): void {
            $panier=Session::getSession("panier");
            $this->vente->putVente($panier);
            $panier->clear();
            Session::removeSession("panier");
            $this->redirection("?controleur=vente&action=liste-vente");
        }
    }

