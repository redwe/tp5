<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function getThumbName($picurl){
    $uploads = explode("/",$picurl);
    $thumb_name = "/".$uploads[1]."/".$uploads[2]."/thumb_".$uploads[3];
    return $thumb_name;
}

function jsonOut($code,$msg='',$data=array()){
    return json_encode(array('code'=>$code,'msg'=>$msg,'data'=>$data),JSON_UNESCAPED_UNICODE);
    //exit();
}