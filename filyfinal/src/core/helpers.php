<?php

use GAC\Core\Autorisation;
use GAC\Core\Session;
    function add_class_invalid(string $fielName){
      echo   isset(Session::getSession("error")[$fielName])?"is-invalid":"";
    } 

    function add_class_hidden(string $fielName){
      echo   !isset(Session::getSession("error")[$fielName])?"visually-hidden":"";
    } 

    function has_role(string $roleName,){
      echo  !Autorisation::asRole($roleName)?"visually-hidden":"";
    } 

    function dd($data){
      echo "<pre>";
      var_dump($data);
      echo "</pre>";
    }