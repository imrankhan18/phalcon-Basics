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
        $edit->password=$request->getPost('password');
        $edit->update();
        $this->response->redirect('index');
    }
    public function deleteAction($id)
    {
        $user= new Users();
        $user->id=$id;
        $user->delete();
        $this->response->redirect('index');
    }
    public function approveAction($id)
    {

        $approve= Users::findFirstById($id);
    
   
    }
    public function editblogAction($blogid)
    {
        // echo $blogid;
        // die();

        $edit= Blogs::findFirst($blogid);
        // print_r($edit);
        // die();
        $request = new Request();
        $edit->blogname=$request->getPost('blogname');
        $edit->blogtype=$request->getPost('blogtype');
        $edit->fullblog=$request->getPost('fullblog');
        $edit->update();
        $this->response->redirect('blogpage');
    }
        public function deleteblogAction($blogid)
        {
            // print_r($blogid) ;
            // die();
        $blog= new Blogs();
        $blog->blogid=$blogid;
        $result=$blog->delete();
        $this->response->redirect('blogpage');
        }
}