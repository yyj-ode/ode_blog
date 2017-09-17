<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\ArticleModel;
use Home\Model\CategoryModel;
class ArticleController extends Controller {
    public function add(){
        $data['article_title'] = I('article_title');
        $data['article_time'] = time();
        $data['article_content'] =I('article_content');
        $data['atype_id'] = I('article_type');
        $data['article_clicks'] =0;
        $text = I('text');
        if(strlen($text)>20){
//            $data['article_summary'] = substr($text,0,20).'...';
            $data['article_summary'] = mb_substr($text,0,20,'utf-8').'...';
        }else{
            $data['article_summary'] =  $text;
        }
        //获取文章正文中的第一张图片
        preg_match('/img src=&quot;(.*?)&quot;/',$data['article_content'],$img);
        $data['article_img'] = $img[1];
        if($data['article_img'] == null){
            $data['article_img'] = 'http://localhost/ode_blog/uploads/default.jpg';
        }

        $articleModel = new ArticleModel();
        $articleModel->data($data)->add();
        return json_encode('');
    }

    public function detail(){
        $article_id = I('article_id');
        $data = M('article')->where("article_id = $article_id")->find();
        $articletype = M('articletype')->where("atype_id = '{$data['atype_id']}'")->find();
        $atype_name = $articletype['atype_name'];
        $controller_name = $articletype['controller'];
        $data['article_content'] = html_entity_decode( $data['article_content']);
//        dumpp($data);
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryData();
        $this->assign('data',$data);
        $this->assign('category',$category);
        $this->assign('controller_name',$controller_name);
        $this->assign('atype_name',$atype_name);
        $this->display('article');
    }

}