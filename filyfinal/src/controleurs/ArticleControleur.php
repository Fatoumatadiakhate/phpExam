<?php 

namespace GAC\Controleurs;

use GAC\Core\Autorisation;
use GAC\Model\Type;
use GAC\Model\Article;
use GAC\Core\controleur;
use GAC\Model\Categorie;
use GAC\Core\Session;
use GAC\Core\Validateur;

// methode POO
class ArticleControleur extends controleur{
    private Article $articles;
    private Type $types;
    private Categorie $categories;
       public function __construct()
    {
      parent::__construct();
      if (!Autorisation::isConnect()) {
        parent::redirection("?controleur=securite&action=show-form");
      }
      $this->articles= new Article();
      $this->types= new Type();
      $this->categories= new Categorie();
      $this->load();
    }
    public function load(){
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"]=="liste-article") {
                
                $this->listerArticle($_REQUEST["page"]);

            }elseif ($_REQUEST["action"]=="add-article") {

                unset($_POST["action"]);
                unset($_POST["controleur"]);
                $this->AddArticle($_POST);

            }elseif ($_REQUEST["action"]=="form-article") {
                
                $this->ChargeForm();                
            }
            elseif ($_REQUEST["action"]=="modifier") {
                
                $this->ChargeForm($this->articles->A_modifier($_REQUEST["effet"]));       
                                     
            }elseif ($_REQUEST["action"]=="add-motif") {
                dd($_POST);
                unset($_POST["action"]);
                unset($_POST["controleur"]);
               
                // $this->articles->Modify("nomArticle",$_POST);
            }
            elseif ($_REQUEST["action"]=="supprimer") {
                
                $this->articles->Delete('nomArticle',$_REQUEST["effet"]);        
                $this->listerArticle($_REQUEST["page"]); 
            }
        }else {
            $this->listerArticle($_REQUEST["page"]);
        }
    }
    
    public function listerArticle(int $page=0):void{

        $responses = $this->articles->findAll($page, OFFSET);
        $this->renderView("articles/liste",["responses"=>$responses,"currentPage"=>$page]);
    }
    public function ChargeForm(array $dataAmodifier=[]):void{
        $categories= $this->categories->findAll();
        $types= $this->types->findAll();
        $this->renderView("articles/form",["types"=>$types,"categories"=>$categories,"dataAmodifier"=>$dataAmodifier]);
    }
    public function AddArticle(array $data){

        if(!Validateur::isEmpty($data["nomArticle"],"nomArticle")){

            Validateur::isEmpty($data["nomArticle"],"nomArticle");
            $articles=$this->articles->trieArticle("article de vente");
            if (Validateur::isExist($articles,"nomArticle",$data["nomArticle"])) {

                Validateur::isExist($articles,"nomArticle",$data["nomArticle"]);
            }
        }

        if (!Validateur::isEmpty($data["prix"],"prix")) {

                Validateur::isNumber($data["prix"],"prix");

        }        

        if (!Validateur::isEmpty($data["quantite"],"quantite")) {

            Validateur::isNumber($data["quantite"],"quantite");

        }

        if (Validateur::isValide() ) {

            $this->save($data);
            $this->redirection("?controleur=article&action=liste-article&page=0");

        }else {

            Session::AddSession("error",Validateur::$error );
            $this->redirection("?controleur=article&action=form-article");

        }
    }

    public  function save(array $data) : void {
        $this->articles->putArticle($data);
    }
}




