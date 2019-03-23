<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\CRM\public/../app/admin\view\roles\add_role.html";i:1544517442;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台登录</title>
   <link type="text/css" rel="stylesheet" href="/static/css/main.css">
</head>
<body>
<div class="main_bg">
    <h1 style="text-align: center"><?php echo $title; ?>角色 [<a href="/admin/roles/lists">角色列表</a>]</h1>
    <form name="loginform" action="/admin/roles/save_role" method="post">
<table width="100%">
    <tr>
        <td>角色名称：</td><td>
        <input name="r_name" value="<?php echo $list['shenfen']; ?>">
        <input name="id" type="hidden" value="<?php echo $list['id']; ?>">
    </td>
    </tr>
    <tr>
        <td> </td><td><input type="submit" name="b1" value=" 保 存 "></td>
    </tr>
</table>
    </form>

    <h1 style="text-align: center">角色列表</h1>
    <table width="100%" cellspacing="0">
        <tr style="background-color: #113366">
            <th>序号</th>
            <th>角色名称</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['id']; ?></td>
            <td><?php echo $vo['shenfen']; ?></td>
            <td>
                <?php if($vo['id'] == 0): ?>
                    <a class="disable" href="#">设置权限</a> |
                    <a class="disable" href="#">编辑</a> |
                    <a class="disable" href="#">删除</a>
                <?php else: ?>
                    <a href="/admin/roles/author/rid/<?php echo $vo['id']; ?>">设置权限</a> |
                    <a href="/admin/roles/add_role/id/<?php echo $vo['id']; ?>">编辑</a> |
                    <a onclick="return confirm('确认要删除吗？')" href="/admin/roles/del/id/<?php echo $vo['id']; ?>">删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>

</body>
</html>