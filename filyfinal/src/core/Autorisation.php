<?php 

namespace GAC\Core;

use GAC\Core\Session;
use GAC\Core\controleur;


    class Autorisation{
        private controleur $controleurs;
        public function __construct(){
            $this->controleurs=new controleur();
        }
        public static function isConnect():bool{
            return Session::getSession("userConnect")!=false;
        } 
        public static function asRole(string $roleName){
            $userConnect=Session::getSession("userConnect");
            
            if( $userConnect ){
               return $userConnect[0]["nomRole"]==$roleName;
            }
            return false;
        } 
        public function isUser(array $userConnect ){
           
             if($userConnect[0]["nomRole"]=="gestionnaire"){

                $this->controleurs->redirection("/?controleur=utilisateur&action=liste-utilisateur");

             }elseif($userConnect[0]["nomRole"]=="vendeur"){

                $this->controleurs->redirection("/?controleur=vente&action=liste-vente");
             }
             elseif($userConnect[0]["nomRole"]=="Responsable de stock"){
                
                $this->controleurs->redirection("/?controleur=approvisionnement&action=liste-approvisionnement");
                
             } elseif($userConnect[0]["nomRole"]=="Responsable Production"){
                
                $this->controleurs->redirection("?controleur=article&action=liste-article&page=0");
        }
    }
}