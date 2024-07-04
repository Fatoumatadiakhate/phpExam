<?php

namespace GAC\Model;

use GAC\Core\ConnectDatabase;



class Users extends ConnectDatabase{
    public function __construct() {
        parent::__construct();
        $this->table = "utilisateur";
    }
    public function findByLoginAndPassword(string $login, string $password):array{
        $sql="SELECT * FROM  $this->table JOIN role ON utilisateur.idRole = role.id 
              WHERE utilisateur.login like '$login' AND utilisateur.password = '$password';";
        return $this->getAll($sql);
    }
    public function findAll(): array
    {
        $sql = "SELECT u.*,r.nomRole FROM $this->table u, role r where u.idRole =r.id";
        return $this->getAll($sql);
    }
    public function getUserByRole(string $role){
        $sql = "SELECT u.*,r.nomRole FROM utilisateur u, role r where u.idRole=r.id and nomRole=$role;";
        return $this->getAll($sql);
    }
    public function putUser(array $datas ):bool{

        extract($datas);

        $sql= "INSERT INTO utilisateur (nomComplet,login,password,idRole,tel,address) 
                VALUES(:nom,:login,:password,:idRole,:tel,:address);";
        $param=[
                ':nom'=> $nomComplet,
                ':login'=> $login,
                ':password'=> $password,
                ':idRole'=> $idRole,
                ':tel'=>$tel,
                ':address'=>$address
               ];
               
        return $this->saveAll($sql,$param);
    }
}