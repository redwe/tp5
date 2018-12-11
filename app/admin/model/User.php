<?php
namespace app\admin\model;

use think\Model;
use think\DB;

class User extends Model
{
    //获取省份、分部、身份、岗位
    public function getShengfen($table,$field){
        $list = [];
        $ids = [];
        $shengfen = Db::name($table)->select();
        foreach($shengfen as $vo){
            array_push($list,$vo[$field]);
            array_push($ids,$vo["id"]);
        }
        return [$ids,$list];
    }

    //获取省份、分部、身份、岗位
    public function getShengfen2($table,$field){
        $shengfen = Db::name($table)->select();
        return $shengfen;
    }

    //获取插入的省份、分部、身份、岗位id
    public function getInsertid($table,$field,$str){
        $shengfen = Db::name($table)->where([$field=>$str])->find();
        return $shengfen["id"];
    }

    //检测要删除的属性是否和用户关联
    public function getIsuser($sid,$id){
        $delid = Db::name("users")->where(["status"=>1,$sid=>$id])->find();
        return $delid["id"];
    }

    //删除属性值
    public function delTables($table,$id){
        $delid = Db::name($table)->where(["id"=>$id])->delete();
        return $delid;
    }

    public function getUserList($where,$limit){
        $join = [
            ["shengs s",'s.id=u.sid'],["fenbus b","b.id=u.bid"],["shenfens f","u.fid=f.id"],["gangweis g","g.id=u.gid"]
        ];
        $field = 'u.*,s.sheng,b.fenbu,f.shenfen,g.gangwei';
        $lists = Db::name("users")
            ->alias("u")
            ->join($join)
            ->field($field)
            ->where($where)
            ->paginate($limit);
        return $lists;
    }

    public function getSoundList($where,$limit){
        $join = [
            ["users u",'u.uname = d.saler'],["shengs s",'s.id=u.sid'],["fenbus b","b.id=u.bid"],["shenfens f","u.fid=f.id"],["gangweis g","g.id=u.gid"]
        ];
        $field = 'd.*,u.uname,s.sheng,b.fenbu,f.shenfen,g.gangwei';
        $lists = Db::name("sounds")
            ->alias("d")
            ->join($join)
            ->field($field)
            ->where($where)
            ->paginate($limit);
        return $lists;
    }

    public function checkAuthor($role_id,$url){
        $where["urls"] = $url;
        $where["uid"] = $role_id;
        $result = Db::name("author")->where($where)->find();
        if(empty($result['id'])){
            return false;
        }
        else
        {
            return true;
        }
    }

}