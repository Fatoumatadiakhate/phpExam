<?php

namespace GAC\Controleurs;


use GAC\Core\Session;
use GAC\Model\Article;
use GAC\Core\controleur;
use GAC\Core\Autorisation;
use GAC\Model\Approvisionnement;
use GAC\Model\Fournisseur;
use GAC\Model\Panier;

    class ApproControleur extends controleur{
        private Approvisionnement $approvisionnement;
        private Article $articles;
        private Fournisseur $fournisseur;
        public function __construct(){

            parent::__construct();
            if (!Autorisation::isConnect()) {
               parent::redirection("?controleur=securite&action=show-form");
             }
            $this->articles= new Article();
            $this->approvisionnement = new Approvisionnement();
            $this->fournisseur = new Fournisseur();
            $this->load();

        }
        public function load(){
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"]=="liste-approvisionnement") {
                    $this->listerAppro();
                }
                elseif ($_REQUEST["action"]=="form-approvisionnement") {

                    $this->ChargeFormAppro();

                }elseif ($_REQUEST["action"]=="add-articleAppro") {

                    $this->AddArticleDansAppros($_POST);
                    
                }elseif ($_REQUEST["action"]=="add-approvisionnement") {
                    
                    $this->save();
                }    
            }else {
               $this->listerAppro();
            }
        }
        public function listerAppro():void{
            
           $appros=$this->approvisionnement->findAll();
           $this->renderView("approvisionnement/liste",["appros"=>$appros]);
        }
        public function ChargeFormAppro():void {
            
            $ArticleTypes = $this->articles->trieArticle("article confection");
            $fournisseurs = $this->fournisseur->findAll();
            $this->renderView("approvisionnement/form",["fournisseurs"=>$fournisseurs,"ArticleTypes"=>$ArticleTypes]);

        }
        public function AddArticleDansAppros(array $data){

            if (Session::getSession("panier")==false) {
                $panier=new Panier();
            }else {
                $panier=Session::getSession("panier");
            }
            $article=$this->articles->findById($data["idArticle"]);
            $panier->AddArticle($article[0] ,$data["idFournisseur"],$data["qte"]);
            Session::AddSession("panier",$panier);            
            $this->redirection("?controleur=approvisionnement&action=form-approvisionnement");
        }

        public  function save(): void {
            $panier=Session::getSession("panier");
            $this->approvisionnement->putAppros($panier);
            $panier->clear();
            Session::removeSession("panier");
            $this->redirection("?controleur=approvisionnement&action=liste-approvisionnement");
        }
    }

        //     if(!Validateur::isEmpty($data["montant"],"montant")){
    
        //         Validateur::isEmpty($data["montant"],"montant");
        //     }
    
        //     if (!Validateur::isEmpty($data["numero"],"numero")) {
    
        //             Validateur::isNumber($data["numero"],"numero");
        //     }        
    
    
        //     if (Validateur::isValide() ) {
    
        //         $this->save($data);
        //         $this->redirection("?controleur=approvisionnement&action=liste-approvisionnement");
    
        //     }else {
    
        //         Session::AddSession("error",Validateur::$error );
        //         $this->redirection("?controleur=approvisionnement&action=form-approvisionnement");
    
        //     }
        // }
    

        // public function infoFournisseur():void{
        //     ob_start();
        //         $appros=$this->approvisionnement->findAppro();
        //         require_once("../view/fournisseur/info.html.php");
        //         $containtview=ob_get_clean();
        //     require_once("../view/layout/base.layout.php");
        // }


    
