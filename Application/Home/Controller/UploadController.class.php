<?php
namespace Home\Controller;
use Think\Controller;
class UploadController extends Controller {
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
                    'src' => 'http://localhost/ode_blog/uploads/'.$file['savepath'].$file['savename'],
                    'title' => '测试图片',
                ];
                $result['data'] = (object)$result['data'];
            }
        }
       echo json_encode( $result);
    }
}