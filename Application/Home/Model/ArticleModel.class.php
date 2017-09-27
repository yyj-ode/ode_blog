<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model {
    public function getArticleList($page,$atype_id){
        //当前页码转换为起始id
        $start = ($page-1)*6;
        //获取文章list
        $data['list'] = M()
            ->table('ode_article')
            ->field("*,FROM_UNIXTIME(article_time,'%Y-%m-%d') time")
            ->where("atype_id = $atype_id")
            ->order("article_time desc")
            ->limit($start,6)
            ->select();
        //获取总条数
        $count =  M('article')->where("atype_id = $atype_id")->count();
        //获取页码数据
        $data['page'] = PageModel::getPageList($page,$count);
        return $data;
    }

    public function getIndexArticleList(){
        $data = M('')->query("
            SELECT a.article_id,a.atype_id,a.article_summary,a.article_title,FROM_UNIXTIME(article_time,'%Y-%m-%d') article_time,
              `at`.atype_name,`at`.controller,a.article_img
            FROM (SELECT * from ode_article ORDER BY article_time desc) a
            LEFT JOIN ode_articletype at ON a.atype_id = `at`.atype_id
            GROUP BY atype_id
            ORDER BY atype_id DESC
        ");
        return $data;
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