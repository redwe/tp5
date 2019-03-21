<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\phpStudy\WWW\CRM\public/../app/admin\view\users\shenpi.html";i:1545100728;s:43:"D:\phpStudy\WWW\CRM\app\admin\view\nav.html";i:1544520164;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-用户管理-订单审批</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
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

        <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
            <tbody>
            <tr align="center" bgcolor="#dcdcdc">
                <th>项目</th>
                <th>地区</th>
                <th>时间</th>
                <th>客户</th>
                <th>意向</th>
                <th>标签</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['project']; ?></td>
                <td><?php echo $vo['province']; ?>-<?php echo $vo['city']; ?></td>
                <td><?php echo date("Y年m月d日",strtotime($vo['datetime'])); ?></td>
                <td><?php echo $vo['guest']; ?></td>
                <td><?php echo $vo['intent']; ?></td>
                <td><?php echo $vo['label']; ?></td>
                <td>
                    <?php if($vo['exam']==0): ?>
                    <span onclick="setexam(<?php echo $vo['oid']; ?>,1)" data-id="<?php echo $vo['id']; ?>" class="ratify">批准</span>
                    <span onclick="setexam(<?php echo $vo['oid']; ?>,2)" data-id="<?php echo $vo['sugges']; ?>" class="turnDown">驳回</span>
                    <?php else: ?>
                    <span style="color: #999"  data-id="<?php echo $vo['id']; ?>" class="">已批准</span>
                    <span style="color: #999" data-id="<?php echo $vo['sugges']; ?>" class="">驳回</span>
                    <?php endif; ?>

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
                <form name="shenpiform" method="post" action="/admin/users/doshenpi">
                <input type="hidden" name="id" id="shenhe_id" value="">
				<span class="maskClose">x</span>
				<p>驳回意见</p>
				<textarea disabled="true" id="sugges" name="sugges"></textarea>
				<div class="proposalBtn">
					<input class="certainBtn" onclick="return checkExam()" type="submit" value="确定"/>
					<input class="cancelBtn" type="button" value="取消"/>
				</div>
                </form>
			</div>
		</div>
	</div>
</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/table.js"></script>
<script>
	$('.turnDown').click(function(){
        var temp = $(this).data("id");
        $("#sugges").val(temp);
		$('.popUps').css('display','block');
	});
	$('.maskClose').click(function(){
        $('.popUps').css('display','none');
    });
    $('.cancelBtn').click(function(){
        $('.popUps').css('display','none');
    });
    function setexam(v,t){
        $("#shenhe_id").val(v);
        switch (t){
            case 1:
                shenpiform.submit();
                break;
            default :
                $("#sugges").attr("disabled",false);
                break;
        }
    }
    function checkExam(){
        var sugges = $("#sugges").val();
        if(sugges.length<1){
            alert("请输入驳回意见！");
            return false;
        }
    }
</script>
