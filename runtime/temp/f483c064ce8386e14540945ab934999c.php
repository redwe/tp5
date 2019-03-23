<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\phpStudy\WWW\CRM\public/../app/admin\view\users\add.html";i:1545293496;s:43:"D:\phpStudy\WWW\CRM\app\admin\view\nav.html";i:1544520164;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-用户管理-新建用户</title>
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
			<div class="selectionCont">
                <form name="userform" method="post" action="/admin/users/addpost/nav/0">
                    <div class="itmeA">
                        <span>地区选择：</span>
                        <div class="options">
                            <?php if(is_array($shengfen) || $shengfen instanceof \think\Collection || $shengfen instanceof \think\Paginator): $key = 0; $__LIST__ = $shengfen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <div class="option1">
                                <?php echo $vo; ?>
                                <div id=" <?php echo $sid[$key-1]; ?>" data-id="sid" data-table="shengs" class="optionDel">-</div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="optionAdd">+</div>
                        <input class="hiDomain" name="shengfen" id="shengfen" type="hidden" value=""/>
                    </div>
                    <div class="itmeB">
                        <span>分部选择：</span>
                        <div class="options">
                            <?php if(is_array($fenbu) || $fenbu instanceof \think\Collection || $fenbu instanceof \think\Paginator): $key = 0; $__LIST__ = $fenbu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <div class="option1">
                                <?php echo $vo; ?>
                                <div id=" <?php echo $bid[$key-1]; ?>" data-id="bid" data-table="fenbus" class="optionDel">-</div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="optionAdd">+</div>
                        <input class="hiDomain" name="fenbu" id="fenbu" type="hidden" value=""/>
                    </div>
                    <div class="itmeC">
                        <span>身份选择：</span>
                        <div class="options">
                            <?php if(is_array($shenfen) || $shenfen instanceof \think\Collection || $shenfen instanceof \think\Paginator): $key = 0; $__LIST__ = $shenfen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <div class="option1">
                                <?php echo $vo; ?>
                                <div id=" <?php echo $fid[$key-1]; ?>" data-id="fid" data-table="shenfens"  class="optionDel">-</div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="optionAdd">+</div>
                        <input class="hiDomain" name="shenfen" id="shenfen" type="hidden" value=""/>
                    </div>
                    <div class="itmeD">
                        <span>岗位选择：</span>
                        <div class="options">
                            <?php if(is_array($gangwei) || $gangwei instanceof \think\Collection || $gangwei instanceof \think\Paginator): $key = 0; $__LIST__ = $gangwei;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <div class="option1">
                                <?php echo $vo; ?>
                                <div id=" <?php echo $gid[$key-1]; ?>" data-id="gid" data-table="gangweis"  class="optionDel">-</div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="optionAdd">+</div>
                        <input  class="hiDomain" name="gangwei" id="gangwei" type="hidden" value=""/>
                    </div>
                    <div class="itme newUser">
                        <div>
                            <span>姓名编辑：</span>
                            <input class="userName" name="userName" type="text" value=""/>
                        </div>
                        <div>
                            <span>登陆账户：</span>
                            <input class="accNum" name="accNum" type="text" value="" />
                        </div>
                        <div>
                            <span>登录密码：</span>
                            <input class="PWD" name="PWD" type="text" value=""/>
                        </div>

                    </div>
				<input class="kaiQi" type="submit" onclick="return checkform()" value="开启身份"/>
                </form>
			</div>
	</body>
</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/index.js"></script>
<script>
    /*用户名验证*/
    function checkform() {

        if ($("#input1").val()) {
            var input1 = $("#input1").val();
            $("#shengfen").val(input1);
        }

        var shengfen = $("#shengfen").val();
        if (shengfen == "") {
            alert('请选择省份！');
            return false;
        }

        if ($("#input2").val()) {
            var input2 = $("#input2").val();
            $("#fenbu").val(input2);
        }
        var fenbu = $("#fenbu").val();
        if (fenbu == "") {
            alert('请选择分部！');
            return false;
        }

        if ($("#input3").val()) {
            var input3 = $("#input3").val();
            $("#shenfen").val(input3);
        }
        var shenfen = $("#shenfen").val();
        if (shenfen == "") {
            alert('请选择身份！');
            return false;
        }

        if ($("#input4").val()) {
            var input4 = $("#input4").val();
            $("#gangwei").val(input4);
        }
        var gangwei = $("#gangwei").val();
        if (gangwei == "") {
            alert('请选择岗位！');
            return false;
        }

        var username = $(".userName").val();
        if (username == "") {
            alert('用户名不能为空');
            return false;
        }

        var userid = $(".accNum").val();
        if (userid == "") {
            alert('账户不能为空');
            return false;
        }

        var userpwd = $(".PWD").val();
        if (userpwd == "") {
            alert('密码不能为空');
            return false;
        }
    }

    $('.options').on('click','.optionDel',function(){
        var sid = $(this).data('id');
        var table = $(this).data('table');
        var id = $(this).attr('id');
        var delobj = $(this).parent();
        if($(this).attr("id")){
            var isdo = confirm("是否删除已经保存的数据？");
            if(isdo){
                $.ajax({
                    type: "POST",
                    url: "/admin/users/isdelOr",
                    data: {sid:sid, id:id},
                    dataType: "text",
                    success: function(data){
                        if(data){
                            if(confirm("此属性已经关联用户信息，删除后会影响用户信息的完整性，是否真的要删除？")) {
                                delobj.remove();
                                deloption(table,id,"/admin/users/deloption");
                            }
                        }
                        else
                        {
                            delobj.remove();
                            deloption(table,id,"/admin/users/deloption");
                        }
                    }
                });
            }
        }
        else
        {
            delobj.remove();
        }
    })
</script>

