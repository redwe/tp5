<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\phpStudy\WWW\CRM\public/../app/admin\view\users\lists.html";i:1544582264;s:43:"D:\phpStudy\WWW\CRM\app\admin\view\nav.html";i:1544520164;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-用户管理-用户列表</title>
	</head>
	<link rel="stylesheet" href="/static/css/index.css" />
	<style>
		.approvalTop ul li{
			width: 11.6%;
		}
		.approvalTop ul li:nth-child(3) {
    		background:transparent;
		}
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
                <form name="listform" method="post" action="/admin/users/lists/nav/1">
                <div class="condtionCont1">
                    <span>地区选择：</span>
                    <div class="condtionArea">
                        <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;if($province == $vo['sheng']): ?>
                                <span class="current"><?php echo $vo['sheng']; ?></span>
                            <?php else: ?>
                                <span class=""><?php echo $vo['sheng']; ?></span>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <input class="hiDomain" name="province" type="hidden" value="">
                </div>
                <div class="condtionCont1">
                    <span>分部选择：</span>
                    <div class="condtionArea">
                        <?php if(is_array($fenbulist) || $fenbulist instanceof \think\Collection || $fenbulist instanceof \think\Paginator): $key = 0; $__LIST__ = $fenbulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;if($department == $vo['fenbu']): ?>
                                <span class="current"><?php echo $vo['fenbu']; ?></span>
                            <?php else: ?>
                                <span class=""><?php echo $vo['fenbu']; ?></span>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <input class="hiDomain" name="department" type="hidden" value="">
                </div>
                <div class="conditionSearch">
                    <input class="searchBtn" type="submit" value="搜索">
                    <input class="searchInput" name="keyword" type="text">
                </div>
                </form>
            </div>
        <form name="editform" method="post" action="/admin/users/editpost">
            <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
            <tbody>
            <tr align="center" bgcolor="#dcdcdc">
						<th>姓名</th>
						<th>地区</th>
						<th>部门</th>
						<th>账号</th>
						<th>密码</th>
						<th>身份</th>
						<th>岗位</th>
						<th>操作</th>
            </tr>
              <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
						<td class="YHBli"><?php echo $vo['uname']; ?></td>
                        <td>
                        <input disabled="disabled" type="hidden" name="mid" value="<?php echo $vo['id']; ?>">
                        <select disabled="disabled" name="shengfen">
                            <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($key % 2 );++$key;if(($vo1['id'] == $vo['sid'])): ?>
                                        <option selected value="<?php echo $vo1['id']; ?>"><?php echo $vo1['sheng']; ?></option>
                                <?php else: ?>
                                        <option value="<?php echo $vo1['id']; ?>"><?php echo $vo1['sheng']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                        </td>
                        <td>
						<select disabled="disabled" name="fenbu">
                            <?php if(is_array($fenbulist) || $fenbulist instanceof \think\Collection || $fenbulist instanceof \think\Paginator): $key = 0; $__LIST__ = $fenbulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($key % 2 );++$key;if(($vo2['id'] == $vo['bid'])): ?>
                                <option selected value="<?php echo $vo2['id']; ?>"><?php echo $vo2['fenbu']; ?></option>
                                <?php else: ?>
                                <option value="<?php echo $vo2['id']; ?>"><?php echo $vo2['fenbu']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                        </td>
                        <td>
						<input type="text" name="uid" value="<?php echo $vo['uid']; ?>" disabled="disabled"/>
                        </td>
                        <td>
						<input type="text" name="pwd" value="<?php echo $vo['pwd']; ?>" disabled="disabled"/>
                        </td>
                        <td>
						<select disabled="disabled" name="shenfen">
                            <?php if(is_array($shenfenlist) || $shenfenlist instanceof \think\Collection || $shenfenlist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenfenlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($key % 2 );++$key;if(($vo3['id'] == $vo['fid'])): ?>
                            <option selected value="<?php echo $vo3['id']; ?>"><?php echo $vo3['shenfen']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $vo3['id']; ?>"><?php echo $vo3['shenfen']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                        </td>
                        <td>
						<select disabled="disabled" name="gangwei">
                            <?php if(is_array($gangweilist) || $gangweilist instanceof \think\Collection || $gangweilist instanceof \think\Paginator): $key = 0; $__LIST__ = $gangweilist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($key % 2 );++$key;if(($vo4['id'] == $vo['gid'])): ?>
                            <option selected value="<?php echo $vo4['id']; ?>"><?php echo $vo4['gangwei']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $vo4['id']; ?>"><?php echo $vo4['gangwei']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                        </td>
                        <td>
							<span class="edit">修改</span>
							<span class="Move" data-id="<?php echo $vo['id']; ?>">删除</span>
                        </td>
                    </tr>
		           <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </form>
                <form name="delform" method="post" action="/admin/users/deluser">
                    <div class="popUps">
                        <div class="mask"><input type="hidden" name="delid" id="delid" value=""></div>
                        <div class="popUpsCont">
                            <div class="proposal">
                                <span class="maskClose">x</span>
                                <p>删除用户</p>
                                <span class="YHxyzy">客户资源转移</span>
                                <select class="YHarea" name="delsheng" id="delsheng" onchange="getdeluser()">
                                    <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($key % 2 );++$key;?>
                                         <option value="<?php echo $vo1['id']; ?>"><?php echo $vo1['sheng']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <select class="YHbranch" name="delfenbu" id="delfenbu" onchange="getdeluser()">
                                    <?php if(is_array($fenbulist) || $fenbulist instanceof \think\Collection || $fenbulist instanceof \think\Paginator): $key = 0; $__LIST__ = $fenbulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($key % 2 );++$key;?>
                                        <option value="<?php echo $vo2['id']; ?>"><?php echo $vo2['fenbu']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <select class="YHuser" name="deluser" id="deluser">
                                    <option value="">选择用户</option>

                                </select>
                                <div class="proposalBtn">
                                    <input class="certainBtn" type="submit" value="确定"/>
                                    <input class="cancelBtn" type="button" value="取消"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
				</div>
                <?php echo $page; ?>
			</div>
	</body>

</html>
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/index.js"></script>
<script src="/static/js/table.js"></script>
<script>
    $('.condtionArea span').click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        $(this).parent().siblings('input').val($(this).html());
    });
    //	删除
    $('.Move').click(function(){
        $(this).parent().parent().remove();
        getdeluser();
    });
    function getdeluser(){
        var delsheng = $("#delsheng").find("option:selected").text();
        var delfenbu = $("#delfenbu").find("option:selected").text();
        var  tempstr  = "";
        $.ajax({
            type: "POST",
            url: "/admin/users/getuserlist",
            data: {dels:delsheng, delf:delfenbu},
            dataType: "json",
            success: function(res){
                res = JSON.parse(res);
                if(res){
                 for(var i=0; i<res.length;i++){
                     var ustr = res[i]['uname'];
                     var ustrid = res[i]['id'];
                     tempstr =  tempstr + '<option value="'+ustrid+'">' + ustr +'</option>' ;
                 }
                    if(tempstr){
                        $("#deluser").html(tempstr);
                    }

                }
            }
        });
    }
</script>