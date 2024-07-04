<?php

namespace GAC\Model;

use GAC\Core\ConnectDatabase;

    class Type extends ConnectDatabase{
        public function __construct() {
            parent::__construct();
            $this->table ="type";
        }
        public function putType(array $datas ):bool{

            extract($datas);
            $sql= "INSERT INTO $this->table (nomType) VALUES(:nom);";
            $param=[':nom'=> $nomType];

            return $this->saveAll($sql,$param);

        }
    }
    $ObjetType=new Type();
