<?php

namespace GAC\Model;


class Panier{
    public $user=null;
    public array $articles=[];
    public $total;
    public function AddArticle(array $article,int $utilisateur,int $qte){
        $motantArticle=$this->MontantArticle($article["prix"],$qte);
        $key=$this->articleExist($article);
        if ($key!==-1) {
            $this->articles[$key]["qte"]+=$qte;
            $this->articles[$key]["montant"]+=$motantArticle;
        }else {
            $article["qte"]=$qte;
            $article["montant"]=$motantArticle;
            $this->articles[]=$article;
        }
        $this->user=$utilisateur;
        $this->total += $motantArticle;
    }
    public function MontantArticle($prix,$qte){
        return $prix * $qte;
    }
    public function articleExist(array $article):int{

        foreach ($this->articles as $key => $value) {
            if ($value["id"]===$article["id"]) {
                return $key++;
            }
        }
        return -1;
    }
    public function clear():void{

        $this->articles=[];
        $this->total=0;
        $this->user=null;
    }
}