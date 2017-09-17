<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CategoryModel;
use Home\Model\RecommendModel;
use Home\Model\ArticleModel;
class IndexController extends Controller {
    public function index(){
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryData();
        $recommendModel = new RecommendModel();
        $recommend = $recommendModel->getRecommendList();
        $articleModel = new ArticleModel();
        $clicks = $articleModel->getClickList();
//        dumpp($clicks);
        $this->assign('clicks',$clicks);
        $this->assign('category',$category);
        $this->assign('recommend',$recommend);
        $this->display();
    }
}