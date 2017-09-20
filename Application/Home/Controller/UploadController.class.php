<?php
namespace Home\Controller;
use Think\Controller;
class UploadController extends Controller {
    protected $rootPath = 'http://47.52.130.241/ode_blog/Uploads/';

    //上传博文中的图片
    public function index(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'Article/'; // 设置附件上传（子）目录
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $result['code'] = 1;
            $result['msg'] = '失败';
            $result['data'] = [];
            $result['data'] = (object)$result['data'];
        }else{// 上传成功
            foreach($info as $file){
                $result['code'] = 0;
                $result['msg'] = '成功';
                $result['data'] = [
                    'src' => 'http://47.52.130.241/ode_blog/Uploads/'.$file['savepath'].$file['savename'],
                    'title' => '测试图片',
                ];
                $result['data'] = (object)$result['data'];
            }
        }
       echo json_encode( $result);
    }

    //上传相册中的图片
    public function photoUpload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'Photo/'; // 设置附件上传（子）目录
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $result['code'] = 1;
            $result['msg'] = '失败';
            $result['data'] = [];
            $result['data'] = (object)$result['data'];
        }else{// 上传成功
            foreach($info as $file){
                $result['code'] = 0;
                $result['msg'] = '成功';
                $image = new \Think\Image();
                $image->open( $upload->rootPath.$file['savepath'].$file['savename']);
                // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
                $image->thumb(220, 160)->save(  $upload->rootPath.$file['savepath'].'thumb'.$file['savename']);
                $result['data'] = [
                    'src' => 'http://47.52.130.241/ode_blog/Uploads/'.$file['savepath'].$file['savename'].',',
                    'thumb' => 'http://47.52.130.241/ode_blog/Uploads/'.$file['savepath'].'thumb'.$file['savename'].',',
                    'title' => '测试图片',
                ];

                $result['data'] = (object)$result['data'];
            }
        }
        echo json_encode( $result);
    }

    //添加图片到数据库
    public function photoAdd(){
        $photo = I('photo');
        $ptype_id = I('ptype_id')?:0;//现在就差前台的一个下拉表没做，没穿这个$ptype_id
        $photo = rtrim($photo, ",");
        $imgs = explode(',',$photo);
//        dumpp($imgs);
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

    //为添加照片页面提供照片类型数据
    public function getPtypeData(){
        $data = M('phototype')->select();
        echo json_encode($data);
    }
}