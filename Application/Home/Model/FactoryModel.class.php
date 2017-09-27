<?php
namespace Home\Model;
use Think\Model;
class FactoryModel extends Model {
    /**
     * @param $savePath:如果是文章中的图片,$savePath = 'Article'，如果是相册中的图片,$savePath = 'Photo'
     * @return \Think\Upload
     */
    static function upload($savePath){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     $savePath.'/'; // 设置附件上传（子）目录
        return $upload;
    }
}