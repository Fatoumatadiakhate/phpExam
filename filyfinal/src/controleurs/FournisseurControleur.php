<?php

namespace GAC\Controleurs;

use GAC\Core\controleur;
use GAC\Core\Autorisation;
use GAC\Model\Fournisseur;

    class FournisseurControleur extends controleur{
        private Fournisseur $fournisseur;
        public function __construct(){
            parent::__construct();
            if (!Autorisation::isConnect()) {
               parent::redirection("?controleur=securite&action=show-form");
             }
            $this->fournisseur = new Fournisseur();
            $this->load();

        }
        public function load(){
            if (isset($_REQUEST["action"])) {
                if ($_REQUEST["action"]=="get-tel") {
                    $telFournisseur=$_REQUEST["tel"];
                    $fournissseurTel=$this->fournisseur->findByTel($telFournisseur);
                    $this->renderJson([
                        "statut"=> $fournissseurTel!=false?200:204,
                        "data"=>$fournissseurTel!=false?$fournissseurTel:null
                    ]);
                }
            }
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
    


    
