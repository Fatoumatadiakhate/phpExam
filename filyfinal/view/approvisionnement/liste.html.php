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
            <h4 class="card-title">Liste des Approvisionnement </h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-end mb-3">
                <a id="" class="btn btn-outline-primary text-outline-white" href="<?php WEBROOT ?>?controleur=approvisionnement&action=form-approvisionnement" role="button">Nouveau</a>

            </div>
            <div class="table-responsive">
                <table class="table table-light table-bordered  ">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Montant</th>
                            <th scope="col">fournisseurs</th>
                            <th scope="col">telephone</th>
                            <th scope="col">Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appros as $appro) : 
                            $date=new \DateTime($appro["date"]); ?>
                           
                            
                            <tr class="">
                                <td><?= $date->format("d-m-Y") ?></td>
                                <td><?= $appro["montant"] ?></td>
                                <td><?= $appro["nomComplet"] ?></td>
                                <td><?= $appro["tel"] ?></td>
                                <td><a name="" id="" class="btn btn-primary" href="#" role="button">voir detail</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>