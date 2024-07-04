<?php 

namespace GAC\Controleurs;

use GAC\Model\Type;
use GAC\Core\Session;
use GAC\Core\controleur;
use GAC\Core\Validateur;
use GAC\Core\Autorisation;
use GAC\Model\Role;

    class RoleControleur extends controleur{
        private Role $role;
        public function __construct()
        {
            parent::__construct();
            if (!Autorisation::isConnect()) {
                parent::redirection("?controleur=securite&action=show-form");
            }
            $this->role= new role();
            $this->load();
        }
        
        public function load(){
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"]=="liste-role") {
                    $this->listerRole();
                }
                elseif ($_REQUEST["action"]=="add-role") {
                    $this->AddRole($_POST);
                }
            } else {
                $this->listerRole();
            }
        }
        public function listerRole():void{
             
            $roles=$this->role->findAll();
            $this->renderView('role/liste',["roles"=>$roles]);
        }

        public  function save(array $datas) : void {

            $this->role->putRole($datas);
        }
        public function AddRole(array $data){

            if(!Validateur::isEmpty($data["nomRole"],"nomRole")){

                Validateur::isEmpty($data["nomRole"],"nomRole");

                if (Validateur::isExist($this->role->findAll(),"nomRole",$data["nomRole"])) {
    
                    Validateur::isExist($this->role->findAll(),"nomRole",$data["nomRole"]);
        
                }
    
            }
            if (Validateur::isValide()) {

                $this->save($data);
            }else {

                Session::AddSession("error",Validateur::$error);
            }
            unset($_POST["controleur"]);
            parent::redirection("?controleur=role&action=liste-role");
        }
    }


