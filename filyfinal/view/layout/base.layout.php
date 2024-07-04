<?php

use GAC\Core\Session;
    $error=[];
    if (Session::getSession("error")) {
        $error=Session::getSession("error");
    }
                        
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../css/styles.css">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
          body {
            background-image: url('fily.jpg');
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
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm  ">
            <div class="container">
                
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0 d-flex justify-content-end">
                        <a class="navbar-brand text-dark " href="#"><img src="../img/logo.png" style="width: 100px;" alt=""></a>
                        <li class="nav-item  ">
                            <a class="nav-link active text-dark <?php (Session::getSession("userConnect")[0]['nomRole']=='gestionnaire')? has_role(Session::getSession("userConnect")[0]['nomRole']):has_role('Responsable Production') ?> " 
                            href="<?php WEBROOT ?>?controleur=article&action=liste-article&page=0" aria-current="page">Article
                                <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark <?php (Session::getSession("userConnect")[0]['nomRole']=='gestionnaire')? has_role(Session::getSession("userConnect")[0]['nomRole']):has_role('Responsable de stock') ?> "
                             href="<?php WEBROOT ?>?controleur=approvisionnement&action=liste-approvisionnement">Approvisionnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark <?php has_role('gestionnaire') ?>" href="<?php WEBROOT ?>?controleur=utilisateur&action=liste-utilisateur">Utilisateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark <?php  (Session::getSession("userConnect")[0]['nomRole']=='gestionnaire')? has_role(Session::getSession("userConnect")[0]['nomRole']):has_role('vendeur')?>" href="<?= WEBROOT ?>?controleur=vente&action=liste-vente">Vente d'article</a>
                        </li>
                        <li class="nav-item">   
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php  (Session::getSession("userConnect")[0]['nomRole']=='gestionnaire')? has_role(Session::getSession("userConnect")[0]['nomRole']):has_role('Responsable Production')?>" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parametrage</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="<?= WEBROOT ?>?controleur=type&action=liste-type">Type</a>
                                <a class="dropdown-item" href="<?= WEBROOT ?>?controleur=categorie&action=liste-categorie">Categorie</a>
                            </div>  
                        </li>
                            
                    </ul>
                </div>
            </div>
            <ul class="navbar-nav  mt-1 me-sm-4 ">
                <li class="nav-item">
                    <a class="nav-link text-dark " href="<?php WEBROOT ?>?controleur=securite&action=logout">Deconnexion</a>
                </li>
            </ul>
        </nav>
 <div class="search">
            <form class="search_form my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Search" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">fily</button>
            </form>
        </div> 


    </header>
    <main>
        <?php
            echo $containtview;
        ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="/js/fichier.js">
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>