<?php

namespace GAC\Model;

use GAC\Core\ConnectDatabase;

    class Role extends ConnectDatabase{
        public function __construct() {
            parent::__construct();
            $this->table ="role";
        }
        public function putRole(array $datas ):bool{

            extract($datas);
            $sql= "INSERT INTO $this->table (nomRole) VALUES(:nom);";
            $param=[':nom'=>$nomRole];
            return $this->saveAll($sql,$param);
        }
    }
    $ObjetRole=new Role();
