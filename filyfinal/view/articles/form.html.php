<?php

use GAC\Core\Autorisation;
use GAC\Core\Session;
    $error=[];
    if (Session::getSession("error")) {
        $error=Session::getSession("error");
    }
      
?>
<style>
    body {
    background-color: rgb(241, 174, 73) ;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
}
.btn {
    background-color: rgb(196, 100, 37);
    color:white;
}
.btn:hover {background-color: rgb(241, 174, 73)

}
</style>
<div class="container mb-5" style="width: 50%;">
    <div class="card mt-5 m-auto">
        <div class="card-header">
            <h4 class="card-title">Nouvel Article</h4>
        </div>
        <div class="card-body ">
            <form action="<?php WEBROOT?>" name="action" method="post">
                <div class="mb-2 mt-2">
                    <label for="Libelle" class="form-label"> Libelle</label>
                    <input name="nomArticle" value="<?= isset($dataAmodifier[0]['nomArticle']) ? $dataAmodifier[0]['nomArticle'] : '' ?>" type="text" class="form-control <?=add_class_invalid("nomArticle")?>" id="" aria-describedby="Libelle">

                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["nomArticle"]??"" ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="Quantité en Stock" class="form-label"> Quantité en Stock</label>
                    <input name="quantite" value="<?= isset($dataAmodifier[0]['quantite']) ? $dataAmodifier[0]['quantite'] : '' ?>" type="text" class="form-control <?=add_class_invalid("quantite")?>" id="" aria-describedby="Quantité en Stock">

                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["quantite"]??"" ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="Prix" class="form-label">Prix</label>
                    <input name="prix" value="<?= isset($dataAmodifier[0]['prix']) ? $dataAmodifier[0]['prix'] : '' ?>" type="text" class="form-control <?=add_class_invalid("prix")?>" id="" aria-describedby="Prix">

                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["prix"]??"" ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="Categorie" class="form-label">Categorie</label>
                    <select name="categorieId" class="form-select form-select-md" aria-label="Default select example">
                        <option >...</option>
                        <?php foreach ($categories as $categorie) : ?>
                            <option value="<?php echo $categorie["id"]; ?>"  ><?= $categorie["nomCategorie"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="Type" class="form-label">Type</label>
                    <select name="typeId" class="form-select form-select-md" aria-label="Default select example">
                        <option selected>...</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type["id"]?>" > <?= $type["nomType"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <input type="hidden" name="controleur" value="article">

                <?php if ($_REQUEST["action"]=="form-article"):?>  
                    <input type="hidden" class=" button " name="action" value="add-article">
                <?php elseif($_REQUEST["action"]=="modifier"):?>
                    <input type="hidden" class=" button " name="action" value="add-modif">
                <?php endif?>

                <div class="d-flex justify-content-end mb-2">
                    <button type="submit" class="btn btn-primary mt-4" style="width: 170px;">Envoyer</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
<?= Session::removeSession("error")?>
