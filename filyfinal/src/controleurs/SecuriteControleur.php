<?php

namespace GAC\Controleurs;

use GAC\Model\Users;
use GAC\Core\Session;
use GAC\Core\controleur;
use GAC\Core\Validateur;
use GAC\Core\Autorisation;



class SecuriteControleur extends controleur{
    private Users $user ;
    private Autorisation $autorisation ;
    public function __construct()
    {
        parent::__construct();
        $this->user= new Users();
        $this->autorisation= new Autorisation();
        $this->layout="connexion";
        $this->load();
    }
    public function load(){
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"]=="connexion") {
                unset($_POST["action"]);
                unset($_POST["controleur"]);
                $this->Connexion($_POST);    
            }
            elseif ($_REQUEST["action"]=="show-form") {
                $this->ShowForm();

            }elseif ($_REQUEST["action"]=="logout") {
                $this->logout();
            } 
        }else {
            $this->ShowForm();
        }
    }
    private function logout():void{
        Session::FermerSession();
        parent::redirection("?controleur=securite&action=show-form");
    }
    private function ShowForm():void{
             
        parent::renderView('securite/form');

    }
    private function Connexion(array $data):void{
    
        if(!Validateur::isEmpty($data["login"],"login")){

            Validateur::isEmail($data["login"],"login");
        }

        if(!Validateur::isEmpty($data["password"],"password")){
            
            Validateur::isEmpty($data["password"],"password");
        }

        if (Validateur::isValide() ) {

            $userConnect=$this->user->findByLoginAndPassword($data["login"],$data["password"]);
            
            if ($userConnect) {
                Session::AddSession("userConnect",$userConnect);
                $this->autorisation->isUser($userConnect);
            }else {
                Validateur::add("erreur_connexion","utilisateur introuvable");
                Session::AddSession("error",Validateur::$error); 
                parent::redirection("?controleur=securite&action=show-form");
            }
        }else{

            Session::AddSession("error",Validateur::$error);
            parent::redirection("?controleur=securite&action=show-form");

        }
  
    }

}


