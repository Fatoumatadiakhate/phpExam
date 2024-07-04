<?php 
namespace GAC\Controleurs;

use GAC\Core\Session;
use GAC\Model\Categorie;
use GAC\Core\Validateur;
use GAC\Core\controleur;
use GAC\Core\Autorisation;

    class CotegorieControleur extends controleur{
        private Categorie $categorie;
        public function __construct()
        {
          parent::__construct();
          $this->categorie= new Categorie();
          if (!Autorisation::isConnect()) {
             parent::redirection("?controleur=securite&action=show-form");
          }
          $this->load();
          
        }
        public function load(){
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"]=="liste-categorie") {
                    $this->listerCategorie();
                }elseif ($_REQUEST["action"]=="add-categorie") {
                    dd($this->AddCategorie($_POST));
                }
               
            }else {
                $this->listerCategorie();
            }
        }

        public function listerCategorie():void{
            $categories=$this->categorie->findAll();
            $this->renderView("categorie/liste",["categories"=>$categories]);
        }

        public  function save(array $data) : void {
            $this->categorie->putCategorie($data);
        }
        public function AddCategorie(array $data){

            if(!Validateur::isEmpty($data["nomCategorie"],"nomCategorie")){

                Validateur::isEmpty($data["nomCategorie"],"nomCategorie");

                if (Validateur::isExist($this->categorie->findAll(),"nomCategorie",$data["nomCategorie"])) {
    
                    Validateur::isExist($this->categorie->findAll(),"nomCategorie",$data["nomCategorie"]);
        
                }
    
            }

            if (Validateur::isValide()) {
                $this->save($data);
            }else {
                Session::AddSession("error",Validateur::$error );
            }
            
            unset($_POST["controleur"]);
            parent::redirection("?controleur=categorie&action=liste-categorie");
        }
    }

