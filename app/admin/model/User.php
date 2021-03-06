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

    public function checkUser($where){
        $join = [
            ["shenfens f","u.fid=f.id"]
        ];
        $field = 'u.*,f.shenfen';
        $lists = Db::name("users")
                ->alias("u")
                ->join($join)
                ->field($field)
                ->where($where)
                ->find();
        return $lists;
    }

    public function getUserList($where,$limit,$param=[]){
        $join = [
            ["shengs s",'s.id=u.sid'],["fenbus b","b.id=u.bid"],["shenfens f","u.fid=f.id"],["gangweis g","g.id=u.gid"]
        ];
        $field = 'u.*,s.sheng,b.fenbu,f.shenfen,g.gangwei';
        if($limit>1){
            $lists = Db::name("users")
                ->alias("u")
                ->join($join)
                ->field($field)
                ->group("u.bid,u.id,u.sid")
                ->where($where)
                ->paginate($limit,false,["query"=>$param]);
        }
        else
        {
            $lists = Db::name("users")
                ->alias("u")
                ->join($join)
                ->field($field)
                ->group("u.bid,u.id,u.sid")
                ->where($where)
                ->find();
        }
        return $lists;
    }

    public function getSoundList($where,$limit){
        $join = [
            ["users u",'u.uname = ds.saler'],["shengs s",'s.id=u.sid'],["fenbus b","b.id=u.bid"],["shenfens f","u.fid=f.id"],["gangweis g","g.id=u.gid"]
        ];
        $field = 'ds.*,u.uname,s.sheng,b.fenbu,f.shenfen,g.gangwei';
        $lists = Db::name("sounds")
            ->alias("ds")
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