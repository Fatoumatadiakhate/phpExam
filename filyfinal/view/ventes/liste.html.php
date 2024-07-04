<style>
    body {
    background-color: rgb(241, 174, 73) ;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
}
.btn {
    background-color: rgb(196, 100, 37);
    color: white;
    color:white;
}
.btn:hover {background-color: rgb(241, 174, 73)

}
</style>
<div class="container mb-5">
    <div class="card mt-5 m-auto">
        <div class="card-header">
            <h4 class="card-title">Liste des Vente </h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-end mb-3">
                <a id="" class="btn btn-outline-primary text-outline-white" href="<?php WEBROOT ?>?controleur=vente&action=form-vente" role="button">Nouveau</a>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered  ">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col"> Nom Client</th>
                            <th scope="col">Article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix en CFA</th>
                            <th scope="col">Montant en CFA</th>
                            <th scope="col">Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventes as $vente): ?>

                            <?php $date=new \DateTime($appro["date"]);?>
                            <tr class="">
                                <td><?= $date->format("d-m-Y") ?></td>
                                <td><?= $vente["nomComplet"] ?></td>
                                <td><?= $vente["nomArticle"] ?></td>
                                <td><?= $vente["qte"] ?></td>
                                <td><?= $vente["prix"] ?></td>
                                <td><?= $vente["montant"] ?></td>
                                <td><a name="" id="" class="btn btn-primary" href="#" role="button">voir detail</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo ($currentPage <= 0) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?controleur=vente&action=liste-vente&page=<?php echo ($currentPage > 0)
                               ? $currentPage - 1 : 0; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php if (isset($ventes['pages'])) : ?>
    <!-- Votre code HTML pour la pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <!-- Liens vers les pages précédentes, pages numérotées, et suivantes -->
            <!-- Exemple basé sur votre code précédent -->
            <?php for ($i = 0; $i < $ventes['pages']; $i++) : ?>
                <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>" aria-current="page">
                    <a class="page-link" href="?controleur=vente&action=liste-vente&page=<?= $i; ?>">
                        <?= $i + 1; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>
<!-- <li class="page-item <?php echo ($currentPage >= $ventes["pages"] - 1) ? 'disabled' : ''; ?>">
    <a class="page-link" href="?controleur=vente&action=liste-vente&page=<?php echo ($currentPage < $ventes["pages"] - 1)
    //     // ? $currentPage + 1 : $ventes["pages"] - 1; ?>" aria-label="Next">
    //     <span aria-hidden="true">&raquo;</span>
    // </a>
</li>
</ul>
</nav>
</div>
</div>
</div>
</div> -->
