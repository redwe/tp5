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

    public function getResources($limit,$where,$order='id desc'){
        $lists = Db::name("resource")->where($where)->order($order)->paginate($limit)->each(function($v,$k){
            $rid = $v['id'];
            $label = Db::name("labels")->field("labels")->where(array("rid"=>$rid))->find();
            if(!empty($label)){
                $label = json_decode($label['labels'],true);
                $v['labels'] = $label['call'];
            }
            else
            {
                $v['labels'] = '';
            }
            return $v;
        });
        return $lists;
    }

    public function getLevels($uid){
        $where["status"] = 1;
        $where['uid'] = $uid;
        $lists = Db::name("levels")->where($where)->select();
        return $lists;
    }
}