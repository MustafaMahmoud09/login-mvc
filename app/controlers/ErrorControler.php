<?php
namespace MVC\controlers;
use MVC\core\Controler;

class ErrorControler extends Controler{

    function notFound(){
 
        $this->view('error'.DS.'notFound.php',[]);
 
    }//end notFound
}//end ErrorControler
?>