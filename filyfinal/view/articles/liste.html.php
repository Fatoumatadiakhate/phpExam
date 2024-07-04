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
c
}
</style>
<div class="container mb-5  ">
    <div class="card mt-5 m-auto">
        <div class="card-header">
            <h4 class="card-title">Liste des Articles </h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-end  gap-3 mb-3 ">
                <div> <a id="" class="btn btn-outline-primary text-outline-white" href="<?php WEBROOT ?>?controleur=article&action=form-article" role="button">Nouveau</a></div>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered  ">
                    <thead>
                        <tr>
                            <th scope="col"> Libelle</th>
                            <th scope="col">Quantité en stock</th>
                            <th scope="col">Prix en (FCFA)</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($responses["data"] as $response) : ?>
                            <tr class="">
                                <td><?php echo $response["nomArticle"]; ?></td>
                                <td><?= $response["quantite"] ?></td>
                                <td><?= $response["prix"] ?> </td>
                                <td><?= $response["nomCategorie"] ?></td>
                                <td><?= $response["nomType"] ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-outline-primary" href="<?php WEBROOT ?>?controleur=article&action=modifier&page=<?=$currentPage?>&effet=<?= $response["nomArticle"] ?>" role="button">Modifier</a>
                                    <a name="" id="" class="btn btn-outline-danger" href="<?php WEBROOT ?>?controleur=article&action=supprimer&page=<?=$currentPage?>&effet=<?= $response["nomArticle"] ?>" role="button">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo ($currentPage <= 0) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?controleur=article&action=liste-article&page=<?php echo ($currentPage > 0)
                               ? $currentPage - 1 : 0; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 0; $i < $responses["pages"]; $i++) : ?>
                            <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>" aria-current="page">
                                <a class="page-link" href="?controleur=article&action=liste-article&page=<?php echo $i; ?>">
                                    <?php echo $i + 1; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo ($currentPage >= $responses["pages"] - 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?controleur=article&action=liste-article&page=<?php echo ($currentPage < $responses["pages"] - 1)
                                ? $currentPage + 1 : $responses["pages"] - 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>