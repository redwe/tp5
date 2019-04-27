<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\phpStudy\WWW\CRM\public/../app/admin\view\ziyuan\emptynum.html";i:1554706024;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-管理员-资源管理</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<body>
            <div style="text-align: center; padding-top: 10px;"><a href='/admin/ziyuan/delempty'>删除所有空号信息(共计：<?php echo $count; ?>条)</a></div>
            <form name="delform" method="post" action="/admin/ziyuan/delzy">
              <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>项目</th>
                        <th>省份</th>
						<th>客户</th>
                        <th>通话质量</th>
                        <th>电话</th>
                     </tr>
                    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
                        $labels = $vo['labels'];
                        $labels = json_decode($labels,true);
                        $tempstr = $labels['call'];
                     ?>
                     <tr>
                        <td><?php echo $vo['id']; ?></td>
						<td><?php echo $vo['project']; ?></td>
						<td><?php echo $vo['province']; ?></td>
						<td><?php echo $vo['guest']; ?></td>
                        <td><a href="#" title='<?php echo $vo['labels']; ?>'><?php echo $tempstr; ?></a></td>
						<td><?php echo $vo['tel']; ?></td>
                     </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                 </tbody>
           </table>
            </form>
        <script src="/static/js/jquery-2.1.4.min.js"></script>

	</body>
</html>