<?php
namespace app\admin\model;

use think\Model;
use think\DB;

class XmModel extends Model
{
    //删除属性值
    public function delTables($table,$id){
        $delid = Db::name($table)->where(["id"=>$id])->delete();
        return $delid;
    }

    public function getXmList($class,$ptype,$st){
        $where['class'] = $class;
        $where['ptype'] = $ptype;
        $where['status'] = $st;
        $lists = Db::name("projects")->where($where)->select();
        return $lists;
    }

    public function getResources($limit,$status,$zytype){
        $where['status'] = $status;
        $where['zytype'] = $zytype;
        $lists = Db::name("resource")->where($where)->paginate($limit);
        return $lists;
    }
}