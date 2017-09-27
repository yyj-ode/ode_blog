<?php
namespace Home\Controller;
use Home\Model\FactoryModel;
use Home\Model\JsonModel;
use Think\Controller;
class UploadController extends Controller {
    //为添加照片页面的下拉选择框，提供照片类型数据，
    public function getPtypeData(){
        $data = M('phototype')->select();//获取照片类型
        echo json_encode($data);
    }

    //上传博文中的图片
    public function index(){
        $this->imgUpload('Article');//调用上传图片方法，参数为要上传的图片类型，Article为文章中的图片
    }

    //上传相册中的图片
    public function photoUpload(){
        $this->imgUpload('Photo');//调用上传图片方法，参数为要上传的图片类型，Photo为相册中的图片
    }

    /**
     * @param $type
     * 图片上传
     * 如果上传的是文章中的图片，则$type = 'Article'
     * 如果上传的是相册中的图片，则$type = 'Photo'
     */
    public function imgUpload($type){
        $method = $type.'ImgUploadSuccess'; //文件上传成功后，需要调用JsonModel，返回json数据，$method为拼接出的JsonModel的方法名
        $upload = FactoryModel::upload($type);  //实例化上传类，参数为要上传的文件夹
        $info   =   $upload->upload();  //开始上传
        if(!$info) {    // 上传错误，提示错误信息
            $result = JsonModel::uploadError();//返回错误信息（数组）
        }else{  // 上传成功
            foreach($info as $file){    //$info可以是同时上传多个文件，需进行遍历
                $this->imgCompress($upload,$file);  //按照原图的比例生成一个最大为220*160的缩略图并保存为thumb+源文件名
                $result = JsonModel::$method($file);    //上传成功的json赋值，$method为第一步拼接出的方法名字符串
            }
        }
        echo json_encode( $result);
    }

    //压缩图片至 $width * $height 像素,保存在同一目录下，文件名为thumb+源文件名
    public function imgCompress($upload,$file){
        $image = new \Think\Image();
        $image->open( $upload->rootPath.$file['savepath'].$file['savename']);
        $image->thumb(220, 160)->save(  $upload->rootPath.$file['savepath'].'thumb'.$file['savename']);
    }

    //添加图片到数据库
    public function photoAdd(){
        $photo = I('photo');
        $ptype_id = I('ptype_id')?:0;
        $photo = rtrim($photo, ",");
        $imgs = explode(',',$photo);
        foreach($imgs as $k => $v){
            $data['photo_img'] = $v;
            $data['ptype_id'] = $ptype_id;
            $res = M('photo')->data($data)->add();
            if($res){//这个到时候做一个跳转就行
                echo '添加成功';
            }else{
                echo '添加失败';
            }
        }
    }
}