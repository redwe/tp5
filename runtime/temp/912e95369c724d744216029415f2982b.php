<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\phpStudy\WWW\CRM\public/../app/user\view\main\index.html";i:1545981406;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>CRM管理系统-销售员端</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
	<link rel="stylesheet" href="/static/font/css/font-awesome.min.css">
	<style>
		.approvalTop ul li{
			width: 11.6%;
		}
		.approvalTop ul li:nth-child(3) {
    		background:transparent;
		}
        .mainPageLeft ul li a{
            color: #d0d0d0;
            text-align: center;
            height: 50px;
            line-height: 50px;
            margin-top: 30px;
            text-decoration: none;
            display: block;
        }
        .mainPageLeft ul li.current a{
            background-color: #ffffff;
            color: #000000;
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
            $userModel = model('app\user\model\User');
            if(empty($picurl)){
                $picurl = "/static/images/bg_touxiang.png";
            }
         ?>
		<div id="mainPageTop" class="mainPageTop">
			<div class="personal">
				<div class="personalCont">
					<span><?php echo $admin; ?></span>
                    <img src="<?php echo $picurl; ?>" width="64" height="64" />
					<span><?php echo $topusers['sheng']; ?> </span>
					<span><?php echo $topusers['fenbu']; ?></span>
					<span><?php echo $topusers['gangwei']; ?></span>
				</div>
				<div style="position: absolute; top:30px; right:30px;">
					<a target="rightmain" class="top_a" href="/user/main/password">[修改密码]</a>
					<a class="top_a" href="/user/login/logout">[安全退出]</a>
				</div>
			</div>
		</div>
		<div class="mainPageLeft">
			<ul id="menus">
                <li><a target="rightmain" href="/user/saler/lingqu/menu/0/nav2/0">领取客户</a></li>
                <li  class="current"><a target="rightmain" href="/user/saler/mykehu/menu/1/nav3/0">我的客户</a></li>
                <li><a target="rightmain" href="/user/saler/order/menu/2/nav/0">订单管理</a> </li>
			</ul>
		</div>

		<div class="mainPageRight">
			<iframe id="rightmain" style="width: 100%; height: 100%;" name="rightmain" src="/user/saler/mykehu/menu/1/nav3/0"></iframe>
		</div>
			<!--更换头像弹窗-->
<div id="Pil" class="popUps5" style="display: none;">
		<div class="mask5"></div>
		<div class="popUpsCont">
			<div class="proposal">
				<span class="maskClose">x</span>
				<p>更换头像</p>
                <form name="toExcel" enctype="multipart/form-data" action="/user/main/uploadpic" method="post">
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
			//点击头像展示上传弹窗
        $('.personalCont').click(function(){
                $('#Pil').css('display','block');
        })
        $('#Pil .mask5').click(function(){
            $('#Pil').css('display','none');
        });
        $('#Pil .maskClose').click(function(){
            $('#Pil').css('display','none');
        });
        $('#Pil .cancelDr').click(function(){
            $('#Pil').css('display','none');
        })
	})
</script>