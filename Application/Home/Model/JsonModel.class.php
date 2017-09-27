<?php
namespace Home\Model;
use Think\Model;
class JsonModel extends Model {
    //图片上传失败后，返回的数据（数组）
    static public function uploadError(){
        $result['code'] = 1;
        $result['msg'] = '失败';
        $result['data'] = [];
        $result['data'] = (object)$result['data'];
        return $result;
    }

    static public function imgUploadSuccess($arr){
        $result['code'] = 0;
        $result['msg'] = '成功';
        $result['data'] = (object)$arr;
        return $result;
    }

    //文章中的图片上传后，返回的json数据（暂时为数组）
    static public function ArticleImgUploadSuccess($file){
        $result['code'] = 0;
        $result['msg'] = '成功';
        $result['data'] = [
            'src' => 'http://'.C('DB_HOST').'/Uploads/'.$file['savepath'].$file['savename'],
            'thumb' => 'http://'.C('DB_HOST').'/Uploads/'.$file['savepath'].'thumb'.$file['savename'],
            'title' => '测试图片',
        ];
        $result['data'] = (object)$result['data'];
        return $result;
    }

    //相册中的图片上传后，返回的json数据（暂时为数组）
    static public function PhotoImgUploadSuccess($file){
        $result['code'] = 0;
        $result['msg'] = '成功';
        $result['data'] = [
            'src' => 'http://'.C('DB_HOST').'/Uploads/'.$file['savepath'].$file['savename'].',',
            'thumb' => 'http://'.C('DB_HOST').'/Uploads/'.$file['savepath'].'thumb'.$file['savename'].',',
            'title' => '测试图片',
        ];
        $result['data'] = (object)$result['data'];
        return $result;
    }
}