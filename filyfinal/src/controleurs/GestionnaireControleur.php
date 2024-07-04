<?php 

namespace GAC\Controleurs;

use  GAC\Model\Role;
use GAC\Core\Session;
use GAC\Core\Validateur;
use  GAC\Core\controleur;
use GAC\Core\Autorisation;
use GAC\Model\Users;

// methode POO
class GestionnaireControleur  extends controleur{

    private Role $role;
    private Users $users;
    public function __construct()
    {
      parent::__construct();
      if (!Autorisation::isConnect()) {
        parent::redirection("?controleur=securite&action=show-form");
      }
      $this->role= new Role();
      $this->users= new Users();
      $this->load();
    }
    public function load(){
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"]=="liste-utilisateur") {

                $this->listeUser();

            }elseif ($_REQUEST["action"]=="add-utilisateur") {

                unset($_POST["action"]);
                unset($_POST["controleur"]);
                $this->save($_POST);

            }elseif ($_REQUEST["action"]=="form-utilisateur") {
                
                $this->ChargeForm();                
            }
        }else {
            $this->listeUser();
        }
    
    }

    // public function Delete(){
    //     // $this->articles->DeleteElement("article","nomArticle","voile");
    // }
    public function listeUser():void{

        $responses = $this->users->findAll();
        $this->renderView("gestionnaire/liste",["responses"=>$responses]);
    }
    public function ChargeForm():void{
        $roles = $this->role->findAll();
        $this->renderView("gestionnaire/form",["roles"=>$roles]);
    }
    // public function AddUtilisateur(array $data){

        // if(!Validateur::isEmpty($data["nomComplet"],"nomComplet")){

        //     Validateur::isEmpty($data["nomArticle"],"nomArticle");
        //     if (Validateur::isExist($this->users->findAll(),"nomComplet",$data["nomComplet"])) {

        //         Validateur::isExist($this->users->findAll(),"nomComplet",$data["nomComplet"]);
        //     }
        // }
        // if(!Validateur::isEmpty($data["adresse"],"adresse")){

        //         Validateur::isEmpty($data["adresse"],"adresse");
             
        //     }
        // if(!Validateur::isEmpty($data["photo"],"photo")){

        //         Validateur::isEmpty($data["photo"],"photo");
             
        //     }
    

        // if (!Validateur::isEmpty($data["prix"],"tel")) {

        //         Validateur::isNumber($data["tel"],"tel");

        // }        

        // if (Validateur::isValide() ) {

        //     $this->save($data);
        //     $this->redirection("?controleur=article&action=liste-article");

        // }else {

        //     Session::AddSession("error",Validateur::$error );
        //     $this->redirection("?controleur=article&action=form-article");

        // }
    // }

    public  function save(array $data) : void {
        $this->users->putUser($data);
        $this->redirection("?controleur=utilisateur&action=liste-utilisateur");

    }
}







