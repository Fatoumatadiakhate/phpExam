<?php 
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
<div class="container mb-5">
    <div class="card mt-5 m-auto w-75">
        <div class="card-header">
           <h2> Liste des Categories</h2>
        </div>
        <div class="card-body">
            <form class="d-flex" method="POST" action="<?=WEBROOT?>">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom Categorie</label>
                        <input type="text" name="nomCategorie" id="" class="form-control <?=add_class_invalid("nomCategorie")?>" placeholder="" aria-describedby="helpId" />
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["nomCategorie"]??"" ?>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin-top: 32px; margin-left: 10px;">
                    <input type="hidden" name="controleur" value="categorie"> 
                    <input type="hidden" name="action" value="add-categorie"> 
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">
                            Enregistrer
                        </button>
                    </div>

                    
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom du categorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categorie) : ?>
                            <tr>
                                <td><?= $categorie['id'] ?></td>
                                <td><?= $categorie['nomCategorie'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<?= Session::removeSession("error")?>