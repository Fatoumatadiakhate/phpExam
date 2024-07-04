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
            
            <h2> Liste des types </h2>
        </div>
        <div class="card-body">
            <form class="d-flex" method="POST" action="<?= WEBROOT ?>">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom Type</label>
                        <input type="text" name="nomType" id="" class="form-control  <?=add_class_invalid("nomType")?> " placeholder="" aria-describedby="helpId" />
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["nomType"]??"" ?>
                        </div>
                    </div>
                </div>
                <div class="col" style="margin-top: 32px; margin-left: 10px;">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark">
                            Enregistrer
                        </button>
                    </div>

                    <input type="hidden" name="controleur" value="type">
                    <input type="hidden" name="action" value="add-type">
                </div>


            </form>

            <div class="table-responsive">
                <table class="table table-light table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom du type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($types as $type) : ?>
                            <tr>
                                <td><?= $type['id'] ?></td>
                                <td><?= $type['nomType'] ?></td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<?= Session::removeSession("error")?>