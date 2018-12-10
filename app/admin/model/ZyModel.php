<?php
namespace app\admin\model;

use think\Model;
use think\DB;

class ZyModel extends Model
{
    //插入记录
    public function addZiyuan($datas){
        $lists = Db::name("resource")->insert($datas);
        return $lists;
    }

    public function getTimeFormat($t){
        $n = intval(($t - 25569) * 3600 * 24); //转换成1970年以来的秒数
        return gmdate('Y-m-d H:i:s',$n);//格式化时间,不是用date哦, 时区相差8小时的
    }
}