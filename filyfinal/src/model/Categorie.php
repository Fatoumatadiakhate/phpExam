<?php
namespace GAC\Model;


use GAC\Core\ConnectDatabase;
// Apprche POO

    class Categorie extends ConnectDatabase{
        public function __construct() {
            parent::__construct();
            $this->table ="categorie";
        }
        public function putCategorie(array $datas):bool{
            
            extract($datas);
            $sql= "INSERT INTO $this->table (nomCategorie) VALUES(:nom);";
            $param=[':nom'=>$nomCategorie];
            return $this->saveAll($sql,$param);
            }
            
    }
    $ObjetCategorie=new Categorie();

