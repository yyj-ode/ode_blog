<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
    //获取目录分类数据
    public function getCategoryData(){
        $data = M()->query('SELECT * FROM ode_category c WHERE cat_level = 1');
        foreach($data as $k => $v){
            $children = M()->query("SELECT * FROM ode_category c WHERE cat_parent_id = {$v['cat_id']}");
            if($children != []){
                $data[$k]['has_children'] = 1;
                $data[$k]['cat_children'] = $children;
            }else{
                $data[$k]['has_children'] = 0;
            }
        }
        return $data;
    }

    //获取目录分类表的全部数据
    public function getAllCategoryData(){
        $data = M('category')->select();
        return $data;
    }


}