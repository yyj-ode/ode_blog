<?php
namespace Home\Model;
use Think\Model;
class PageModel extends Model {
    /**
     * 获取页码数据
     * @param $page = 当前页码
     * @param $count = 总数据条数
     * @param $num = 每页多少条数据
     * @return mixed 返回一个数组，包含总页数、总条数、当前页、上一页、下一页、首页、末页的数值
     */
    static public function getPageList($page,$count,$num){
        $data['count'] = ceil($count/$num);    //总页数
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