<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {
    public function getArticleList($page,$atype_id){
        $start = ($page-1)*6;
        $data['list'] = M()
            ->table('ode_article')
            ->field("*,FROM_UNIXTIME(article_time,'%Y-%m-%d') time")
            ->where("atype_id = $atype_id")
            ->limit($start,6)
            ->select();
        $count =  M()->table('ode_article')->where("atype_id = $atype_id")->count();
        $data['count'] = ceil($count/6);    //总页数
        $data['total'] = $count;    //总数
        $data['page'] = $page;  //当前页
        $data['pre'] = $page-1;   //上一页
        if($data['pre'] < 1){
            $data['pre'] = 1;
        }
        $data['next'] = $page+1;  //下一页
        if($data['next'] > $data['count']){
            $data['next'] = $data['count'];
        }
        return $data;
    }

    public function getIndexArticleList(){

    }

    public function getClickList(){
        $data = M('article a')
            ->field('a.article_id,a.article_title,at.atype_name')
            ->join('ode_articletype at ON a.atype_id = at.atype_id ','LEFT')
            ->order('article_clicks')
            ->limit(10)
            ->select();
        return $data;
    }
}