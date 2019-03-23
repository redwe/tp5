<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\phpStudy\WWW\CRM\public/../app/admin\view\menus\lists.html";i:1544668332;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link type="text/css" rel="stylesheet" href="/static/css/main.css">
</head>
<body>
<div class="main_table">
    <h1 style="text-align: center">菜单列表 [<a href="/admin/menus/add">添加新菜单</a>]</h1>
    <table width="100%" style="border: #aaa 1px solid" cellspacing="0">
        <tr style="background-color: #3366aa">
            <th>序号</th>
            <th>菜单名称</th>
            <th>所属模块</th>
            <th>控制器</th>
            <th>方法</th>
            <th>参数</th>
            <th>图标</th>
            <th>级别</th>
            <th>操作</th>
       </tr>
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr style="background-color:#5577aa; color: #fff;">
            <td><?php echo $vo['id']; ?></td>
            <td><a style="color: #fff" href="/<?php echo $vo['m_model']; ?>/<?php echo $vo['m_ctrl']; ?>/<?php echo $vo['m_method']; ?>/<?php echo $vo['m_param']; ?>"><?php echo $vo['m_name']; ?></a></td>
            <td><?php echo $vo['m_model']; ?></td>
            <td><?php echo $vo['m_ctrl']; ?></td>
            <td><?php echo $vo['m_method']; ?></td>
            <td><?php echo $vo['m_param']; ?></td>
            <td><?php echo $vo['m_icon']; ?></td>
            <td><?php echo $vo['levels']; ?></td>
            <td>
                <a style="color: #fff" href="/admin/menus/edit/id/<?php echo $vo['id']; ?>">编辑</a> |
                <a style="color: #fff" href="/admin/menus/del/id/<?php echo $vo['id']; ?>">删除</a>
            </td>
        </tr>
        <?php 
            $subid = $vo["id"];
            $submenus = $sublist[$subid];
         if(is_array($submenus) || $submenus instanceof \think\Collection || $submenus instanceof \think\Paginator): $i = 0; $__LIST__ = $submenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo2['id']; ?></td>
            <td><a href="/<?php echo $vo2['m_model']; ?>/<?php echo $vo2['m_ctrl']; ?>/<?php echo $vo2['m_method']; ?>/<?php echo $vo2['m_param']; ?>"><?php echo $vo2['m_name']; ?></a></td>
            <td><?php echo $vo2['m_model']; ?></td>
            <td><?php echo $vo2['m_ctrl']; ?></td>
            <td><?php echo $vo2['m_method']; ?></td>
            <td><?php echo $vo2['m_param']; ?></td>
            <td><?php echo $vo2['m_icon']; ?></td>
            <td><?php echo $vo2['levels']; ?></td>
            <td>
                <a href="/admin/menus/edit/id/<?php echo $vo2['id']; ?>">编辑</a> |
                <a href="/admin/menus/del/id/<?php echo $vo2['id']; ?>">删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>

</body>
</html>