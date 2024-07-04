<?php

namespace GAC\Model;

use GAC\Core\ConnectDatabase;

    class Fournisseur extends ConnectDatabase{
        public function __construct() {
            parent::__construct();
            $this->table ="fournisseur";
        }
        public function findByTel(string $tel):array{
            $sql="SELECT * FROM $this->table WHERE tel='$tel' ;";
           return $this->getAll($sql); 
        }
        public function putFournisseur(array $datas ):bool{

            extract($datas);

            $sql= "INSERT INTO $this->table (nomComplet,address,tel) VALUES(:nom,':address',:tel);";
            $param=[':nom'=> $nomComplet,
                    ':address'=> $address,
                    ':tel'=> $tel
                   ];

            return $this->saveAll($sql,$param);
        }
    }