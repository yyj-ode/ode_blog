<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 14:16
 */
function dumpp($data){
    echo '<pre>';print_r($data);die;
}

function getPageList($page,$count){
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