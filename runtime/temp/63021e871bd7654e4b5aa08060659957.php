<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\phpStudy\WWW\CRM\public/../app/admin\view\xiangmu\xueli.html";i:1545448522;s:44:"D:\phpStudy\WWW\CRM\app\admin\view\nav2.html";i:1544520280;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-管理员-学历</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<body>
			<div class="selectionTop">
                <ul>
    <?php 
    $userModel = model('app\admin\model\User');
    if($userModel->checkAuthor($authorid,"/admin/xiangmu/kecheng")){
     if((\think\Request::instance()->param('nav2') == '0')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/xiangmu/kecheng/nav2/0">课程</a> </li>

    <?php 
    }
    if($userModel->checkAuthor($authorid,"/admin/xiangmu/xueli")){
     if((\think\Request::instance()->param('nav2') == '1')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/xiangmu/xueli/nav2/1">学历</a> </li>

    <?php 
    }
    if($userModel->checkAuthor($authorid,"/admin/xiangmu/zhengshu")){
     if((\think\Request::instance()->param('nav2') == '2')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/xiangmu/zhengshu/nav2/2">证书</a></li>

    <?php 
    }
     ?>
</ul>
			</div>
			<div class="selectionCont">
                <form name="form1" method="post" action="/admin/xiangmu/addpro">
				<div class="itmeA">
					<span>项目名称：</span>
					<div class="options">
                        <?php if(is_array($xmlist) || $xmlist instanceof \think\Collection || $xmlist instanceof \think\Paginator): $i = 0; $__LIST__ = $xmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="option1">
                            <?php echo $vo['project']; ?>
                            <div id="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['project']; ?>" class="optionDel">-</div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div class="optionAdd">+</div>
                    <input class="hiDomain" name="addpro" id="project" type="hidden" value="project"/>
                    <input type="hidden" name="class" id="class1" value="xueli">
				</div>
                </form>
                <form name="form2" method="post" action="/admin/xiangmu/addpro">
				<div class="itmeB">
					<span>专业分类：</span>
					<div class="options">
                        <?php if(is_array($prolist) || $prolist instanceof \think\Collection || $prolist instanceof \think\Paginator): $i = 0; $__LIST__ = $prolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="option1">
                            <?php echo $vo['project']; ?>
                            <div id="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['project']; ?>"  class="optionDel">-</div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
					<div class="optionAdd">+</div>
                    <input class="hiDomain" name="addpro" id="ptype" type="hidden" value="ptype"/>
                    <input type="hidden" name="class" id="class2" value="xueli">
				</div>
                </form>
                <form name="form3" method="post" action="/admin/xiangmu/addpro">
				<div class="itmeC">
					<span>院校名称：</span>
					<div class="options">
                        <?php if(is_array($schlist) || $schlist instanceof \think\Collection || $schlist instanceof \think\Paginator): $i = 0; $__LIST__ = $schlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div class="option1">
                            <?php echo $vo['project']; ?>
                            <div id="<?php echo $vo['id']; ?>" data-id="<?php echo $vo['project']; ?>"  class="optionDel">-</div>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
					<div class="optionAdd">+</div>
                    <input class="hiDomain" name="addpro" id="school" type="hidden" value="school"/>
                    <input type="hidden" name="class" id="class3" value="xueli">
				</div>
                </form>
			</div>
	</body>
</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/addInput.js"></script>
<script>
    $('.options').on('blur','.addinput',function(){
        var addinput = $(this).val();
        if (addinput != "") {
            if(confirm("确认保存吗？")){
                $(this).parents("form").submit();
            }
        }
    })
</script>
