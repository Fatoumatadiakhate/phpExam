<?php

use GAC\Core\Session;

$error = [];
if (Session::getSession("error")) {
    $error = Session::getSession("error");
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
            <h4 class="card-title">Nouvelle Vente</h4>
        </div>
        <div class="card-body ">
            <form action="<?php WEBROOT ?>" name="action" method="post">
                <div class="mb-3">
                    <label for="Vendeur" class="form-label">Client</label>
                    <select name="idClient" class="form-select form-select-md" aria-label="Default select example">
                        <option selected>...</option>
                        <?php foreach ($clients as $client) : ?>
                            <option  value="<?php echo $client["id"]; ?>">
                                <?= $client["nomComplet"]; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="Article_vente" class="form-label">Article vente</label>
                        <select name="idArticle" class="form-select form-select-md" aria-label="Default select example">
                            <option selected>...</option>
                            <?php foreach ($ArticleTypes as $ArticleType) : ?>
                                <option value="<?= $ArticleType["id"]; ?>"><?= $ArticleType["nomArticle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Article_vente" class="form-label">Quantité à acheter </label>
                        <input name="qte" type="text" class="form-control" placeholder="quantité" aria-label="quantité">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $error["qte"] ?? "" ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary p-2 m-4 " style="width: 70px ;height:40px;">add</button>
                </div>

                <div class="mb-2">

                </div>
                <input type="hidden" name="controleur" value="vente">
                <input type="hidden" name="action" value="add-articleVente">
        </div>
        </form>
        <?php if (Session::getSession("panier")!=false) :?>
        <div class="table-responsive p-2 ">
            <table class="table table-light table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Article </th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Montant </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (Session::getSession("panier")!=false) :
                         foreach (Session::getSession("panier")->articles as $article) : ?>
                            <tr class="">
                                <td><?= $article["nomArticle"] ?></td>
                                <td><?= $article["qte"] ?></td>
                                <td><?= $article["prix"] ?></td>
                                <td><?= $article["montant"] ?></td>
                            </tr>
                        <?php endforeach; endif;?>
                </tbody>
            </table>
        </div>
        <?php endif ?>
        <div>
            <div class="my-2 float-end  p-2 m-4">
                Totals: <spam class="text-danger fs-4"> <?php if (Session::getSession("panier")!=false) echo Session::getSession("panier")->total; else echo "0" ?> CFA</spam>
            </div>
        </div>
        <div class=" p-2 mb-2">
            <div class="d-grid gap-2">
                <a name="" id="" class="btn btn-primary" href="<?php WEBROOT ?>?controleur=vente&action=add-vente" role="button">Enregistrer</a>
            </div>
        </div>
    </div>
</div>
</div>

<?= Session::removeSession("error") ?>