<?php 
namespace GAC\Core;

use GAC\Controleurs\RoleControleur;
use GAC\Controleurs\TypeControleur;
use GAC\Controleurs\ApproControleur;
use GAC\Controleurs\ArticleControleur;
use GAC\Controleurs\SecuriteControleur;
use GAC\Controleurs\CotegorieControleur;
use GAC\Controleurs\FournisseurControleur;
use GAC\Controleurs\GestionnaireControleur;
use GAC\Controleurs\VenteControleur;

class Router{
    public static function run(){
        if (isset($_REQUEST["controleur"])) {
            if ($_REQUEST["controleur"] == "article") {
                
                $ArticleControleur=new ArticleControleur();
            } 
            elseif ($_REQUEST["controleur"] == "approvisionnement") {
                $ApproControleur= new ApproControleur();
            } 
            elseif ($_REQUEST["controleur"] == "type") {
                $TypeControleur=new TypeControleur();
            } 
            elseif ($_REQUEST["controleur"] == "categorie") {
                $CotegorieControleur= new CotegorieControleur();
            }
            elseif ($_REQUEST["controleur"] == "securite") {
                $securiteControleur= new SecuriteControleur();
            
            }elseif ($_REQUEST["controleur"] == "fournisseur") {
                $FournisseurControleur= new FournisseurControleur();
            }
            elseif ($_REQUEST["controleur"] == "utilisateur") {
                $GestionnaireControleur= new GestionnaireControleur();
            }
            elseif ($_REQUEST["controleur"] == "vente") {
                $VenteControleur = new VenteControleur();
            }
        } else {
            $securiteControleur = new SecuriteControleur();
        }
    }
}
