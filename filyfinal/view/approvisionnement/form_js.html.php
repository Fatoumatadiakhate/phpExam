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
            <h4 class="card-title">Nouvel Approvisionnement</h4>
        </div>
        <div class="card-body ">
            <form action="<?php WEBROOT ?>" name="action" method="post">
                <div class="mb-3 d-flex gap-3">
                    <div class="col">
                        <label for="Article_confession" class="form-label is-invalid">Telephone</label>
                        <input name="tel" id="telFournisseur" type="text" class="form-control " placeholder="tel" aria-label="">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        </div>
                    </div>
                    <div class="col">
                        <label for="Telephone" class="form-label"> Nom</label>
                        <input name="nomComplet" id="nomComplet" type="text" class="form-control" placeholder="" aria-label=""disabled>
                    </div>
                    <div class="col">
                        <label for="Address" class="form-label">Address </label>
                        <input name="address" id="address" type="text" class="form-control" placeholder="" aria-label="" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="Article_confession" class="form-label">Article confession</label>
                        <select name="idArticle" class="form-select form-select-md" aria-label="Default select example">
                            <option selected>...</option>
                            <?php foreach ($ArticleTypes as $ArticleType) : ?>
                                <option value="<?php echo $ArticleType["id"]; ?>"><?= $ArticleType["nomArticle"] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="Article_confession" class="form-label">Quantité de l'article </label>
                        <input name="qteAppro" type="text" class="form-control" placeholder="quantité" aria-label="quantité">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $error["qteAppro"] ?? "" ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary p-2 m-4 " style="width: 70px ;height:40px;">add</button>
                </div>

                <div class="mb-2">
            </div>     
        </div>
        </form>
        <div>
            <div class="my-2 float-end  p-2 m-4">
                Totals: <spam class="text-danger fs-4">0 CFA</spam>
            </div>
        </div>
        <div class=" p-2 mb-2">
            <div class="d-grid gap-2">
                <a name="" id="" class="btn btn-primary" href="<?php WEBROOT ?>
                ?controleur=approvisionnement&action=add-approvisionnement" role="button">Enregistrer</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php WEBROOT ?>/js/ApproControleur.js" type="module"></script>
 