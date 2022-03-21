
<?php 
use Phalcon\Mvc\Controller;

class MemberController extends Controller
{
public function createAction()
{
    $member->setMemberPic(base64_encode(file_get_contents($this->request->getUploadedFiles()[0]->getTempName())));  
}

}