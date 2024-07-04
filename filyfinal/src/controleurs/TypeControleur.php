<?php 

namespace GAC\Controleurs;

use GAC\Model\Type;
use GAC\Core\Session;
use GAC\Core\controleur;
use GAC\Core\Validateur;
use GAC\Core\Autorisation;



    class TypeControleur extends controleur{
        private Type $type;
        public function __construct()
        {
            parent::__construct();
            if (!Autorisation::isConnect()) {
                parent::redirection("?controleur=securite&action=show-form");
            }
            $this->type= new Type();
            $this->load();
        }
        
        public function load(){
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"]=="liste-type") {
                    $this->listerType();
                }
                elseif ($_REQUEST["action"]=="add-type") {
                    $this->AddType($_POST);
                }
            } else {
                $this->listerType();
            }
        }
        public function listerType():void{
             
            $types=$this->type->findAll();
            $this->renderView('type/liste',["types"=>$types]);
        }

        public  function save(array $datas) : void {

            $this->type->putType($datas);
        }
        public function AddType(array $data){

            if(!Validateur::isEmpty($data["nomType"],"nomType")){

                Validateur::isEmpty($data["nomType"],"nomType");

                if (Validateur::isExist($this->type->findAll(),"nomType",$data["nomType"])) {
    
                    Validateur::isExist($this->type->findAll(),"nomType",$data["nomType"]);
        
                }
    
            }
            if (Validateur::isValide()) {

                $this->save($data);
            }else {

                Session::AddSession("error",Validateur::$error);
            }
            unset($_POST["controleur"]);
            parent::redirection("?controleur=type&action=liste-type");
        }
    }

