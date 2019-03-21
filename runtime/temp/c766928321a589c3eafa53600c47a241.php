<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\phpStudy\WWW\CRM\public/../app/admin\view\users\jilu.html";i:1544671231;s:43:"D:\phpStudy\WWW\CRM\app\admin\view\nav.html";i:1544520164;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-用户管理-通话记录</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
    <style>
        .jilu_td span{ padding-top: 10px;}
    </style>
	<body>
			<div class="selectionTop">
                <ul>
    <?php 
    $userModel = model('app\admin\model\User');
    if($userModel->checkAuthor($authorid,"/admin/users/add")){
     if((\think\Request::instance()->param('nav') == '0')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/users/add/nav/0">新建用户</a> </li>

    <?php 
    }
    if($userModel->checkAuthor($authorid,"/admin/users/lists")){
     if((\think\Request::instance()->param('nav') == '1')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/users/lists/nav/1">用户列表</a> </li>

    <?php 
    }
    if($userModel->checkAuthor($authorid,"/admin/users/jilu")){
     if((\think\Request::instance()->param('nav') == '2')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/users/jilu/nav/2">通话记录</a></li>

    <?php 
    }
    if($userModel->checkAuthor($authorid,"/admin/users/shenpi")){
     if((\think\Request::instance()->param('nav') == '3')): ?>
        <li class="current">
    <?php else: ?>
        <li>
    <?php endif; ?>
        <a href="/admin/users/shenpi/nav/3"> 订单审批</a></li>
    <?php 
    }
     ?>
</ul>

			</div>
			<div class="condition">
                <form name="listform" method="post" action="/admin/users/jilu/nav/2">
				<div class="condtionCont1">
					<span>地区选择：</span>
					<div class="condtionArea">
                        <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;if($province == $vo['sheng']): ?>
                                <span class="current"><?php echo $vo['sheng']; ?></span>
                            <?php else: ?>
                                <span class=""><?php echo $vo['sheng']; ?></span>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <input class="hiDomain" name="province" type="hidden" value="">
					</div>
				</div>
				<div class="condtionCont1">
					<span>分部选择：</span>
					<div class="condtionArea">
                        <?php if(is_array($fenbulist) || $fenbulist instanceof \think\Collection || $fenbulist instanceof \think\Paginator): $key = 0; $__LIST__ = $fenbulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;if($department == $vo['fenbu']): ?>
                                <span class="current"><?php echo $vo['fenbu']; ?></span>
                            <?php else: ?>
                                <span class=""><?php echo $vo['fenbu']; ?></span>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <input class="hiDomain" name="department" type="hidden" value="">
					</div>
				</div>
				<div class="conditionSearch">
					<input class="searchBtn" type="submit" value="搜索"/>
                    <input class="searchInput" name="keyword" type="text">
				</div>
                </form>
			</div>

            <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
                <tbody>
                <tr align="center" bgcolor="#dcdcdc">
                    <th>项目</th>
                    <th>对象</th>
                    <th>时间</th>
                    <th>时长</th>
                    <th>业务员</th>
                    <th width="500">操作</th>
                </tr>
                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $vo['project']; ?></td>
                    <td><?php echo $vo['guest']; ?></td>
                    <td><?php echo $vo['datetime']; ?></td>
                    <td><?php echo $vo['times']; ?></td>
                    <td><?php echo $vo['saler']; ?></td>
                    <td class="jilu_td">
                        <span class=""><img class="approvalPhone" src="/static/images/ic_call.png" alt="电话" /></span>
                        <span class=""><img class="approvalEmal" src="/static/images/ic_.png" alt="邮箱" /></span>
                        <span class=""><img class="approvalB" src="/static/images/ic_move.png" alt="操作" /></span>
                        <span class=""><img class="approvalDel" src="/static/images/ic_delete.png" alt="删除" /></span>
                        <span class=""><img class="approvalShopping" src="/static/images/ic_card.png" alt="购物车" /></span>
                        <span class=""><img class="approvalP" src="/static/images/ic_tiaodong.png" alt="对比" /></span>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <?php echo $page; ?>
	</body>
	<div class="popUps">
		<div class="mask"></div>
		<div class="popUpsCont">
			<div class="proposal">
				<span class="maskClose">x</span>
				<p>驳回意见</p>
				<textarea></textarea>
				<div class="proposalBtn">
					<input class="certainBtn" type="button" value="确定"/>
					<input class="cancelBtn" type="button" value="取消"/>
				</div>
			</div>
		</div>
	</div>
</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/table.js"></script>
<script>
	$('.condtionArea span').click(function(){
		$(this).addClass('current').siblings().removeClass();
        $(this).parent().find('input').val($(this).html());
	})
</script>