<?php



namespace GAC\Model;

// use GAC\Core\ConnectDatabase;
use GAC\Core\ConnectDatabase;


//   Methode de POO


        class Article extends ConnectDatabase{
            public function __construct() {
                parent::__construct();
                $this->table ="article";
            }
            public function findAll(int $page=0,int $offset=OFFSET): array {
                $page*=OFFSET;
                $sql = "SELECT a.*,c.nomCategorie,t.nomType FROM $this->table a,type t ,categorie c 
                        WHERE a.typeId = t.id  and  a.categorieId = c.id limit $page,$offset;";
                // 
                $sqlCount = "SELECT COUNT(*) as nbreArticle FROM $this->table;";

                $data=$this->getAll($sql);
                $result=$this->getAll($sqlCount);
                return [
                    "totalElements"=>$result[0]["nbreArticle"],
                    "data"=>$data,
                    "pages"=>ceil($result[0]["nbreArticle"]/$offset)
                ];

            }
            
            public function trieArticle(string $trier):array{
                    $sql="SELECT a.*,c.nomCategorie,t.nomType FROM $this->table a,type t ,categorie c 
                            WHERE a.typeId = t.id  and  a.categorieId = c.id and nomType='$trier' ;";

                return $this->getAll($sql); 
            }
           
            public  function putArticle(array $datas){

                extract($datas);
                
                $sql = "INSERT INTO article (nomArticle, prix, quantite, typeId, categorieId)
                        VALUES (:libelle,:prix,:qte,:idType,:idCategorie);";

                $param=[
                    ':libelle'=>$nomArticle,
                    ':prix'=>$prix,
                    ':qte'=>$quantite,
                    ':idType'=>$typeId,
                    ':idCategorie'=>$categorieId,
                ];

                return $this->saveAll($sql,$param);
                        
                    
            }
        }

        $ObjetArticle=new Article();







