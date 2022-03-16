<?php

use Phalcon\Mvc\Controller;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Http\Request;

class LoginController extends Controller
{
    public function indexAction()
    {
        //return '<h1>Hello!!!</h1>';
    }
    public function registerAction()
    {
        
        $result = Users::find(['conditions' => 'email = ?1 AND password =?2 AND role = ?3','bind'=> [1 => 'ikik@gmail.com',2 => '123',3=>'admin']]);
        // print_r($result);
        $resul123=$this->request->getPost();
        // print_r($resul123);
        // // print_r($resul123['role']);
        // // print_r($result[0]->email);
        // print_r($result[0]->role);
        // die();
        
        
        // die();
        $_SESSION['admindetails']=$this->getArray($result[0]);

        if($result[0]->email==$resul123['email'] && $result[0]->password==$resul123['password'] && $result[0]->role=='admin') 
        {
             header('location:../dashboard');
        }
        else{
            echo "Not matched";
            // die();
        }
}

public function getArray($result) 
{
        return array(
        'id'=>$result->id,
        'name'=>$result->name,
        'email'=>$result->email,
        'password'=>$result->password,
        'status'=>$result->status
            
    );

}
            

}
