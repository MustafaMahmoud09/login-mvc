<?php

namespace MVC\controlers;
use MVC\core\Controler;
use MVC\core\Helper;
use MVC\core\Session;
use MVC\models\UserModel;
use Rakit\Validation\Validator;

class UserControler extends Controler{
    
    private UserModel $objUserModel;
    function __construct(){
       
        $this->objUserModel=new UserModel();    
        Session::startSession();

    }//end construct
    function login(){
    
    $this->view('user'.DS.'login.php',[]); 

    }//end login
    function register(){
  
    $this->view('user'.DS.'register.php',[]);

    }//end register
     
    function postLogin(){
   
        if(isset($_POST['login'])) {  

            $validator = new Validator;
       
             $validation = $validator->make($_POST, [
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
             ]);
       
           $validation->validate();
           $validation->fails();
           $errors = $validation->errors()->firstOfAll();
          
           if(empty($errors)){

            $email=$_POST['email'];
            $password=$_POST['password'];

            $data=$this->objUserModel->login($email,$password);
    
            if(!empty($data)){
              
              Session::set('userData',$data);  
        
             Helper::redirct("Home\home");

            }else{
            
            Helper::redirct("User\login");

            }

           }else{
           
            Helper::redirct("User\login");

           }
 
    }

}//end loginRegister

    function postRegister(){
 
     if(isset($_POST['register'])) {  

     $validator = new Validator;

      $validation = $validator->make($_POST, [
     'name'                  => 'required',
     'email'                 => 'required|email',
     'password'              => 'required|min:6',
      ]);

    $validation->validate();
    $validation->fails();
    $errors = $validation->errors()->firstOfAll();
    
    if(empty($errors)){
    
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
       
        $queryCheck=$this->objUserModel->register($name,$email,$password);
        
        if($queryCheck){
              
            Helper::redirct("User\login");

        }else{
    
            Helper::redirct("User\register");

        }

    }else{
  
        Helper::redirct("User\register");

    }
    }else{

        Helper::redirct("User\register");
    }
}//end postRegister

}//UserControler
?>