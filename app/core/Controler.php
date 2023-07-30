<?php
namespace MVC\core;

class Controler{
 
    
    protected function view($path,$arrayData){
      
        extract($arrayData);
     
        require_once VIEWS.DS.$path;
    
    }//end view

   }//end Controler
?>