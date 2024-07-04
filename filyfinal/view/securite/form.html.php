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
    background-image:
    ;
}
.btn {
    background-color: rgb(196, 100, 37);
    color:white;
}
.btn:hover {background-color: rgb(241, 174, 73)

}
</style>
<div class="container mb-15" style="width: 40% ; ">
    <div class="card mt-5 m-auto" style="background-image: url('fily.jpg');">
        <div class="card-header d-flex justify-content-center">
            <h4 class="card-title">Se connecter</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-danger <?= add_class_hidden("erreur_connexion") ?>" role="alert">
                <?= $error["erreur_connexion"] ?? "" ?>
            </div>

            <form action="<?= WEBROOT ?>" name="action" method="post">
                <div class="mb-2 mt-2">
                    <label for="Login" class="form-label">Login</label>
                    <input name="login" type="email" class="form-control <?= add_class_invalid("login") ?>" id="Login">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["login"] ?? "" ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="Mots_de_passe" class="form-label">Mots de passe</label>
                    <input name="password" type="password" class="form-control <?= add_class_invalid("password") ?>" id="Mots_de_passe">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= $error["password"] ?? "" ?>
                    </div>
                </div>

                <input type="hidden" name="controleur" value="securite">
                <input type="hidden" name="action" value="connexion">
                <div class="d-flex justify-content-center mb-2">
                    <button type="submit" class="btn btn-primary mt-4" style="width: 500px;">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= Session::removeSession("error") ?>
