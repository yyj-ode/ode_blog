<?php
namespace Home\Model;
use Think\Model;
class RecommendModel extends Model {
    public function getRecommendList(){
        $data = M('recommend r')
            ->field("r.article_id,a.article_title,a.article_img,FROM_UNIXTIME(a.article_time,'%Y-%m-%d') article_time,a.atype_id,at.atype_name")
            ->join('ode_article a ON r.article_id = a.article_id','LEFT')
            ->join('ode_articletype at ON a.atype_id = at.atype_id','LEFT')
            ->order('r.recommend_rank')
            ->select();
        return $data;
    }
}