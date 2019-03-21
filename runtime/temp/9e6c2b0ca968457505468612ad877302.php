<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\phpStudy\WWW\CRM\public/../app/admin\view\main\index.html";i:1545981536;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>CRM管理系统-管理员端</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<link rel="stylesheet" href="/static/font/css/font-awesome.min.css">
	<style>
		.approvalTop ul li {
			width: 11.6%;
		}
		
		.approvalTop ul li:nth-child(3) {
			background: transparent;
		}
		
		.top_a {
			color: #fff;
			font-size: 16px;
			text-decoration: none
		}
		
		.menu {
			color: #fff;
			font-size: 18px;
		}
	</style>

	<body>
		<?php 
        $userModel = model('app\admin\model\User');
        //dump($topusers);
        if(empty($picurl)){
            $picurl = "/static/images/bg_touxiang.png";
        }
         ?>
		<div id="mainPageTop" class="mainPageTop">
			<div class="personal">
				<div class="personalCont">

					<span><?php echo $admin; ?></span>
					<img src="<?php echo $thumb_name; ?>" width="64" height="64" />
					<span><?php echo $topusers['sheng']; ?> </span>
					<span><?php echo $topusers['fenbu']; ?></span>
					<span><?php echo $topusers['gangwei']; ?></span>
				</div>
				<div style="position: absolute; top:30px; right:30px;">
					<a target="rightmain" class="top_a" href="/admin/users/password">[修改密码]</a>
					<a class="top_a" href="/admin/login/logout">[安全退出]</a>
					<?php  if($authorid=='3'){  ?>
					<a target="rightmain" class="menu" href="/admin/menus/lists"><i class="fa fa-list"></i></a>
					<a target="rightmain" class="menu" href="/admin/roles/add_role"><i class="fa fa-user"></i></a>
					<?php  }  ?>
				</div>
			</div>
		</div>
		<div class="mainPageLeft">
			<ul id="menus">
                <?php 
                if($userModel->checkAuthor($authorid,"/admin/xiangmu/kecheng")){
                 ?>
                <li class="current"><a target="rightmain" href="/admin/xiangmu/kecheng/menu/0/nav2/0">项目管理</a></li>
                <?php 
                }
                if($userModel->checkAuthor($authorid,"/admin/ziyuan/kecheng")){
                 ?>
                <li><a target="rightmain" href="/admin/ziyuan/kecheng/menu/1/nav3/0">资源管理</a></li>
                <?php 
                }
                if($userModel->checkAuthor($authorid,"/admin/users/jilu")){
                 ?>
                <li><a target="rightmain" href="/admin/users/jilu/menu/2/nav/2">用户管理</a> </li>
                <?php 
                }
                 ?>
			</ul>
		</div>
		<div class="mainPageRight">
			<iframe id="rightmain" style="width: 100%; height: 100%;" name="rightmain" src="/admin/main/welcome"></iframe>
		</div>
		
	<!--更换头像弹窗-->
<div id="Pil" class="popUps5" style="display: none;">
		<div class="mask5"></div>
		<div class="popUpsCont">
			<div class="proposal">
				<span class="maskClose">x</span>
				<p>更换头像</p>
                <form name="toExcel" enctype="multipart/form-data" action="/admin/main/uploadpic" method="post">
				<div class="drMb">
                    <div style="padding-top: 10px; cursor: pointer">
                        <img width="120" id="file_img" onclick="$('#file').click();" src="/static/images/default.png">
                        <input type="file" onchange="setdeafultpic(this,'file')" name="file" id="file">
                    </div>
				</div>
				
				<div class="proposalBtn1">
                    <input name="uid" type="hidden" value="<?php echo $admin; ?>">
					<input class="startDr" type="submit" value="更换">
					<input class="cancelDr" type="button" value="取消">
				</div>
                </form>
			</div>
		</div>
        </div>

	</body>

</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/SuperSlide.js"></script>
<script src="/static/js/thumb.js"></script>
<script>
	$(function() {
		$("#menus").find("li").click(function() {
			$("#menus").find("li").each(function() {
				$(this).attr("class", "");
			});
			$(this).attr("class", "current");
		})
	})
	//点击头像展示上传弹窗
$('.personalCont').click(function(){
        $('#Pil').css('display','block');	
})
    $('#Pil .mask5').click(function(){
        $('#Pil').css('display','none');
    });
    $('#Pil .maskClose').click(function(){
        $('#Pil').css('display','none');    	
    })
    $('#Pil .cancelDr').click(function(){
        $('#Pil').css('display','none');
    })
</script>