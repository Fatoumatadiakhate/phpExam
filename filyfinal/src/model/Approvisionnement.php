<?php

namespace GAC\Model;

use GAC\Core\Session;
use GAC\Model\Panier;
use GAC\Core\ConnectDatabase;

    // methode poo
    class Approvisionnement extends ConnectDatabase{
        public function __construct() {
            parent::__construct();
            $this->table ="approvisionnement";
        }
        public function findAll():array{

            $sql = "SELECT * FROM fournisseur f, $this->table A
                    WHERE A.idFournisseur=f.id";
            return $this->getAll($sql);
        }
    public function putAppros(Panier $panier){

        $date=date("Y-m-d");
        $idUser=Session::getSession("userConnect")[0]['id'];

        $sql = "INSERT INTO $this->table (date,montant,idFournisseur,idUser)
                VALUES (:date,:montant,:idFournisseur,:idUser)";
        $param=[
            ':date'=>$date,
            ':montant'=>$panier->total,
            ':idFournisseur'=>$panier->user,
            ':idUser'=>$idUser
        ];

        dd($this->saveAll($sql,$param));
        $idAppro=$this->pdo->lastInsertId();

        foreach ($panier->articles as $article) {
            $sqls="INSERT INTO detailAppro (qteAppro,idArticle,idAppro,montant)
                   VALUES (:qteAppro,:idArticle,:idAppro,:montant)";

            $params=[
                ':qteAppro'=>$article["qte"],
                ':idArticle'=>$article["id"],
                ':idAppro'=>$idAppro,
                ':montant'=>$article["montant"]
            ];
            $this->saveAll($sqls,$params);

            $qteStock=$article["quantite"];
            $qteAppro=$article['qte'];
            $idArticle=$article['id'];
            $sqlA = "UPDATE article SET quantite = $qteStock + $qteAppro  WHERE id = $idArticle ;";
            $this->saveAll($sqlA);   
        }
    }
}
    $Approvisionnement=new Approvisionnement();






