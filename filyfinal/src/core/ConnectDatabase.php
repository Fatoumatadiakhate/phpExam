<?php

namespace GAC\Core;

use PDO;
use PDOException;

// Apprche POO

class ConnectDatabase
{
    protected $dsn = 'mysql:host=localhost:3306;dbname=Gestion_atelier_couture';
    protected $username = 'root';
    protected $password = '';
    protected $pdo;
    protected string $table;
    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function findAll(): array
    {
        return  $this->getAll("SELECT * FROM $this->table;");
    }

    public function saveAll(string $sql, array $datas = []): bool
    {
        try {

            $result = $this->pdo->prepare($sql);
            return  $result->execute($datas);
           
        } catch (PDOException $e) {
            return false;
        }
    }
    public function findById(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id ='$id';";
        return $this->getAll($sql);
    }

    public function getAll(string $sql): array
    {
        try {
            $result = $this->pdo->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];

        }
    }

    public function Delete(string $nomColonne, string $nomElement):bool{

        $sqlDetail = "DELETE FROM detailAppro WHERE idArticle = (SELECT id FROM $this->table WHERE $nomColonne = :nomElement)";
        $stmtDetail = $this->pdo->prepare($sqlDetail);
        $stmtDetail->bindParam(':nomElement', $nomElement);
        $stmtDetail->execute();

        $sql = "DELETE FROM {$this->table} WHERE $nomColonne = :nomElement ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nomElement', $nomElement);
        return $stmt->execute();
    }


    public function Modify(string $nomElement,array $data){

        extract($data);
        $sql = "UPDATE $this->table SET $nomArticle = :nomArticle, $prix = :prix,$quantite = :quantite,
                $typeId = :typeId,$categorieId = :categorieId WHERE $nomColonne = :nomElement";
                
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nomArticle', $nomArticle);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':typeId', $typeId);
        $stmt->bindParam(':categorieId', $categorieId);
        $stmt->bindParam(':nomElement', $nomElement);

        return $stmt->execute();
    }
   public function A_modifier(string $nomElement):array{
    
        $sqlData="SELECT * FROM $this->table WHERE nomArticle = :nomElement";

        $result=$this->pdo->prepare($sqlData);
        $result->bindParam(':nomElement', $nomElement);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
   }
}
        // instanciation classe
