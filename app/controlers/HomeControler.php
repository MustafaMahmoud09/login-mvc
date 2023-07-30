<?php
namespace MVC\controlers;
use MVC\core\Controler;
use MVC\core\Session;

class HomeControler extends Controler{
     
    function __construct(){
    
        Session::startSession();

        if(!Session::itemExist("userData")){
             
            echo "error";die;    
        
        }

    }//end construct

    function home(){
  
       parent::view('home'.DS.'home.php',[]); 
    }//end home
    
}//end HomeControler
?>