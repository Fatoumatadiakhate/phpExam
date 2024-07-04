<?php 


namespace GAC\Core;

use GAC\Core\Session;

class controleur{
    protected string $layout;

    function __construct()
    {
        Session::OuvrirSession();
        $this->layout="base";
    }

    public function renderView(string $view, array $data = []) {

        ob_start();
        extract($data);
        require_once "../view/$view.html.php";
        $containtview = ob_get_clean();
        require_once("../view/layout/$this->layout.layout.php");
        
    }
    public function redirection(string $path){
        
        header("Location:".WEBROOT.$path);

    }
    public function renderJson(array $data=[]){
        
        echo json_encode($data);
    }

} 