<?php
namespace MVC\core;

class App{
    
    private $controler;
    private $method;

    private $params=[];
     
    function __construct(){

        $this->url();
        $this->render();
    
    }//end construct

    private function url(){

        $queryString=$_SERVER['QUERY_STRING'];
        
        if(!empty($queryString)){

            $url=explode('/',$queryString);

            $this->controler= (isset($url[0]))? $url[0].'Controler': 'ErrorControler' ;
            $this->method= (isset($url[1]))? $url[1] : 'notFound';
            
            unset($url[0],$url[1]);
             
            $this->params=array_values($url);

        }else{

            $this->controler="ErrorControler";
            $this->method="notFound";
        
        }

        $this->controler='MVC\controlers\\'.$this->controler;
    
    }//end url()

    private function render(){
    
    $check=false;

    if(class_exists($this->controler)){

        $this->controler=new $this->controler();

        if(method_exists($this->controler,$this->method)){

         call_user_func_array([$this->controler,$this->method],$this->params);

        }else{
      
         $check=true;

        }

    }else{
    
      $check=true;

    }

    if($check){

        $this->controler=new ('MVC\controlers\\'."ErrorControler")();
        $this->method="notFound";
        
        call_user_func_array([$this->controler,$this->method],$this->params); 

    }

    }//end render()

}//end App
?>