<?php
namespace MVC\core;

class Helper{

    static function redirct($path){

     header("LOCATION: http://localhost/MVC_SUMMARY_Login/public/$path");

    }

}

?>