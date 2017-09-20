<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\CategoryModel;

class PhotoController extends Controller {
    //相册主页数据
    public function index(){
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryData();
        $phototype = M('phototype pt')
            ->field("pt.*,p.photo_img,p.thumb_img")
            ->join('ode_photo p on pt.ptype_id = p.ptype_id','LEFT')
            ->group('p.ptype_id')
            ->select();
//        dumpp($phototype);
        $this->assign('phototype',$phototype);
        $this->assign('category',$category);
        $this->display('Photo/phototypeList');
    }

    //相册-分相册数据
    public function photoList(){
        $ptype_id = I('ptype_id');
        $page = I('page')?:1;
        $start = ($page-1)*6;
        $data['list'] = M('photo')
            ->where("ptype_id = $ptype_id")
            ->order('photo_id desc')
            ->limit($start,12)
            ->select();
//        dumpp($photo);
        $count = M('photo')
            ->where("ptype_id = $ptype_id")
            ->count();
        $data['count'] = ceil($count/12);    //总页数
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
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryData();
        $this->assign('category',$category);
        $this->assign('data',$data);
        $this->display('Photo/photoList');
    }

    //添加图片到数据库
    public function photoAdd(){
        $photo = I('photo');
        $thumb = I('thumb');
        $ptype_id = I('ptype_id')?:0;//现在就差前台的一个下拉表没做，没穿这个$ptype_id
        $photo = rtrim($photo, ",");
        $thumb = rtrim($thumb, ",");
        $imgs = explode(',',$photo);
        $thumbs = explode(',',$thumb);
//        dumpp($imgs);
        foreach($imgs as $k => $v){
            foreach($thumbs as $k1 => $v1){
                $data['photo_img'] = $v;
                $data['ptype_id'] = $ptype_id;
                if($k1 == $k){
                    $data['thumb_img'] = $v1;
                    $res = M('photo')->data($data)->add();
                    if($res){//这个到时候做一个跳转就行
                        echo '添加成功';
                    }else{
                        echo '添加失败';
                    }
                }
            }
        }
    }
}