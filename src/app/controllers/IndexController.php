<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->users = Users::find();
         //return '<h1>Hello World!</h1>';
    }
    public function editAction($id)
    {

        $edit= Users::findFirstById($id);
        $request = new Request();
        $edit->name=$request->getPost('username');
        $edit->email=$request->getPost('email');
        $edit->update();
        $this->response->redirect('index');
    }
    public function deleteAction($id)
    {
        $user= new Users();
        $user->id=$id;
        $result= $user->delete();
        $this->response->redirect('index');
}
}
