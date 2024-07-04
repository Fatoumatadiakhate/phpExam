<?php

namespace GAC\Model;

use GAC\Core\ConnectDatabase;

class Vente extends ConnectDatabase{
    private int  $idVente ;
    public function __construct()
    {
        parent::__construct();
        $this->table = "vente";
    }
    public function findAll(int $page=0, int $offset=OFFSET):array{
        $page*=OFFSET;
        $sql="SELECT * FROM detailVente d,$this->table v,article a,utilisateur u
              WHERE d.idVente=v.id AND  d.idArticle= a.id AND  v.idUser = u.id  limit $page,$offset;";
        return $this->getAll($sql);
    }
    
    public function putVente(Panier $panier){
            
        $date = date("Y-m-d");

        $sql = "INSERT INTO $this->table (montant,idUser,date) VALUES (:montant,:idUser,:date);";

        $param = [
            ':date' => $date,
            ':montant'=> $panier->total,
            ':idUser' => $panier->user
        ];  
        $this->saveAll($sql, $param);
        $this->idVente  =  $this->pdo->lastInsertId();
        foreach ($panier->articles as $article) {
            
            $sqls = "INSERT INTO detailVente (idVente, idArticle, prix,qte) 
                    VALUES (:idVente, :idArticle, :prix, :qte);";
            $params = [
                ':idVente' =>$this->idVente,
                ':idArticle' => $article["id"],
                ':prix' => $article["prix"],
                ':qte' => $article["qte"]
            ];
            $this->saveAll($sqls,$params);

            $qteStock = $article["quantite"];
            $qte = $article['qte'];
            $idArticle = $article['id'];
            
            $sqlA = "UPDATE article SET quantite = :newQuantite WHERE id = :idArticle;";
            $paramsA = [
                ':newQuantite' => $qteStock - $qte,
                ':idArticle' => $idArticle
            ];
            $this->saveAll($sqlA, $paramsA);
        }
    }
}
    $vente = new Vente();


    