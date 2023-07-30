<?php
namespace MVC\core;
use PDO;

class Model{
 
    protected function connection(){
      
        define('USERNAME','root');
        define('PASSWORD','');
        define('HOST','localhost');
        define('DBNAME','login_mvc');
        define('DNS','mysql:host='.HOST.';dbname='.DBNAME);
   
        return new PDO(DNS,USERNAME,PASSWORD);

    }//end connection

}//end Model
?>