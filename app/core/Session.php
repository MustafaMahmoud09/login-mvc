<?php
namespace MVC\core;

class Session{

   static function startSession(){
    
    @session_start();

   }//end startSession

   static function set($key,$value){
  
    $_SESSION[$key]=$value;

   }//end set

   static function get($key){

    if(isset($_SESSION[$key])){

        return $_SESSION[$key];

    }
      

   }//end get


   static function itemExist($key){

   if(!empty(self::get($key))){
   
    return true;
   
  }

   return false; 

   }//end itemExist

   static function endSession(){

   @session_destroy();

   }//end endSession
}//end Session

?>