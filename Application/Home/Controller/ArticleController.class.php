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

        //getArticleSummary() --> 从正文中截取文章的摘要
        $data['article_summary'] = $this->getArticleSummary($text);
        //getArticleImg() --> 获从正文中截取第一张图片
        $img = $this->getArticleImg($data['article_content']);
        //获取第一张图片的缩略图，作为文章标题的配图
        $data['article_img'] = $this->getThumbUrl($img);

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
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryData();
        $this->assign('data',$data);
        $this->assign('category',$category);
        $this->assign('controller_name',$controller_name);
        $this->assign('atype_name',$atype_name);
        $this->display('article');
    }

    //从正文中截取文章的摘要
    public function getArticleSummary($text){
        if(strlen($text)>50){
            $data = mb_substr($text,0,50,'utf-8').'...';
        }else{
            $data = $text;
        }
        return $data;
    }

    //从正文中截取第一张图片
    public function getArticleImg($content){
        preg_match('/img src=&quot;(.*?)&quot;/',$content,$img);
        $img = $img[1];
        if($img == null){
            $img = 'http://'.C('DB_HOST').'/Uploads/default.jpg';
        }
        return $img;
    }

    //拼接出该图片的缩略图路径
    public function getThumbUrl($img){
        $img_chips = explode('/',$img);
        $save_name = 'thumb'.array_pop($img_chips);
        array_push($img_chips,$save_name);
        $result = implode('/',$img_chips);
        return $result;
    }

}