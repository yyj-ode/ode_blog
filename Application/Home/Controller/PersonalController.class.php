<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CategoryModel;
class PersonalController extends Controller {
    public function index(){
        $categoryModel = new CategoryModel();
        $data = $categoryModel->getCategoryData();
//        dumpp($data);
        $this->assign('data',$data);
        $this->display();
    }
}