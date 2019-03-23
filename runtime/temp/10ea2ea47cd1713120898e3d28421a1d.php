<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\phpStudy\WWW\CRM\public/../app/admin\view\ziyuan\repeat.html";i:1553302848;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-管理员-资源管理</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<body>
            <div style="text-align: center; padding-top: 10px;"><a href='/admin/ziyuan/delrepeat'>删除所有重复的信息（只保留1条）</a></div>
            <form name="delform" method="post" action="/admin/ziyuan/delzy">
              <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>项目</th>
                        <th>省份</th>
						<th>客户</th>
                        <th>电话</th>
						<th>重复数</th>
                     </tr>
                    <?php if(is_array($tellist) || $tellist instanceof \think\Collection || $tellist instanceof \think\Paginator): $i = 0; $__LIST__ = $tellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                     <tr>
                        <td><?php echo $vo['id']; ?></td>
						<td><?php echo $vo['project']; ?></td>
						<td><?php echo $vo['province']; ?></td>
						<td><?php echo $vo['guest']; ?></td>
						<td><?php echo $vo['tel']; ?></td>
						<td><?php echo $vo['count']; ?></td>
                     </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                 </tbody>
           </table>
            </form>
        <script src="/static/js/jquery-2.1.4.min.js"></script>

	</body>
</html>