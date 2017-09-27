<?php
namespace Home\Model;
use Think\Model;
class PageModel extends Model {
    /**
     * 获取页码数据
     * @param $page = 当前页码
     * @param $count = 总数据条数
     * @return mixed
     */
    static public function getPageList($page,$count){
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
}