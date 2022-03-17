<?php 
use Phalcon\Mvc\Controller;

class BlogpageController extends Controller
{
public function indexAction()
{
    $this->view->blogs = Blogs::find();    
}
public function addAction()
{
    $blogs = new Blogs();
    $blogs->assign(
        $this->request->getPost(), [ 'pic',
        'blogname',
        'blogtype',
        'fullblog']
    );
    $blogs->save();
    $this->fetchBlogAction();
    // die();
    $this->response->redirect('blogpage');

}
public function fetchBlogAction()
{
    $result = Blogs::find();

    // print_r($result);
    
    // print_r($result[0]->blogname);
    // die();
}

}
?>