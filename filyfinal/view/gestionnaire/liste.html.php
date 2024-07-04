
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
    <div class="card mt-5 m-auto">
        <div class="card-header">
            <h4 class="card-title">Liste des Utilisateurs </h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-end  gap-3 mb-3 ">
                <div> <a id="" class="btn btn-outline-primary text-outline-white" href="<?php WEBROOT ?>?controleur=utilisateur&action=form-utilisateur" role="button">Nouveau</a></div>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered  ">
                    <thead>
                        <tr>
                            <th scope="col"> Nom Prenom</th>
                            <th scope="col">telephone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($responses as $response) : ?>
                            <tr class="">
                                <td><?php echo $response["nomComplet"]; ?></td>
                                <td><?= $response["tel"] ?></td>
                                <td><?= $response["address"] ?> </td>
                                <td><?= $response["nomRole"] ?></td>
                                <td><a name="" id="" class="btn btn-primary" href="#" role="button">voir detail</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>