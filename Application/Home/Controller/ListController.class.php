<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CategoryModel;
use Home\Model\ArticleModel;
class ListController extends Controller {

    //根据子类的属性$atype_name，查找出各种类型的文章列表：
    //例如，CircleController集成此类，然后属性$atype_name='朋友圈'，就能查出类型为'朋友圈'的文章列表
    public function index(){
        $page = I('page')?:1;
        $articletype = M('articletype')->field('atype_id')->where("atype_name = '{$this->atype_name}'")->find();
        $atype_id = $articletype['atype_id'];
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();
        $category = $categoryModel->getCategoryData();
        $data = $articleModel->getArticleList($page,$atype_id);
//        dumpp($data);
        $this->assign('location',$this->atype_name);
        $this->assign('category',$category);
        $this->assign('data',$data);
        $this->display('Article/articleList');
    }
}