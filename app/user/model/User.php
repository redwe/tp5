<?php
namespace app\user\model;

use think\Model;
use think\DB;

class User extends Model
{

    public function getUserList($where, $limit)
    {
        $join = [
            ["shengs s", 's.id=u.sid'], ["fenbus b", "b.id=u.bid"], ["shenfens f", "u.fid=f.id"], ["gangweis g", "g.id=u.gid"]
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
}