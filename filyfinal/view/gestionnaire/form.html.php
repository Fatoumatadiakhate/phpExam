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
            <h4 class="card-title">Nouvel Utilisateur</h4>
        </div>
        <div class="card-body ">
            <form action="<?php WEBROOT ?>" name="action" method="post">
                
                <div class="mb-2 mt-2">
                    <label for="Nom et Prenom" class="form-label"> Nom et Prenom</label>
                    <input name="nomComplet" type="text" class="form-control <?= add_class_invalid("nomComplet") ?>" id="" aria-describedby="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["nomComplet"] ?? "" ?>
                    </div>
                </div>
                <div class="mb-3 d-flex gap-3">
                <div class="mb-2 mt-2">
                    <label for="Login" class="form-label"> Login</label>
                    <input name="login" type="text" class="form-control <?= add_class_invalid("login") ?>" style="width:300px;" id="" aria-describedby="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["login"] ?? "" ?>
                    </div>
                </div>
                <div class="mb-2 mt-2">
                    <label for="Mots de passe" class="form-label"> Mots de passe</label>
                    <input name="password" type="text" class="form-control <?= add_class_invalid("password") ?>" style="width:300px;" id="" aria-describedby="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["password"] ?? "" ?>
                    </div>
                </div>
                </div>
                <div class="mb-3 d-flex gap-4">
                <div class="mb-2">
                    <label for=" Téléphone portable" class="form-label"> Téléphone portable</label>
                    <input name="tel" type="text" class="form-control <?= add_class_invalid("tel") ?> " style="width:300px;"  id="" aria-describedby="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["tel"] ?? "" ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="add resse" class="form-label">adresse</label>
                    <input name="address" type="text" class="form-control <?= add_class_invalid("adresse") ?> "style="width:300px ;" id="" aria-describedby="">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["adresse"] ?? "" ?>
                    </div>
                </div>
                </div>
                <div class="mb-2">
                    <label for="Role" class="form-label">Role</label>
                    <select name="idRole" class="form-select form-select-md" aria-label="Default select example">
                        <option selected>...</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?php echo $role["id"]; ?>"><?= $role["nomRole"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <input type="hidden" name="controleur" value="utilisateur">
                <input type="hidden" name="action" value="add-utilisateur">
                <div class="d-flex justify-content-end mb-2">
                    <button type="submit" class="btn btn-primary mt-4" style="width: 170px;">Envoyer</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<?= Session::removeSession("error") ?>