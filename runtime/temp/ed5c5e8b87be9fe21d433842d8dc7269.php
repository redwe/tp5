<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\phpStudy\WWW\CRM\public/../app/user\view\saler\mykehu.html";i:1555725384;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CRM主界面-销售员-我的客户</title>
    <link rel="stylesheet" href="/static/css/common.css" />
    <link rel="stylesheet" href="/static/css/Seller.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/home.css"/>
    <style type="text/css">
        table tr th:last-of-type{
            width: 500px;
        }
        table tr td span img{
            padding: 0 13px;
        }
        .ThilInput ul li{ font-size: 14px;}
        .conditionSearch .searchInput{
            height: 28px!important;
            border-radius: 4px;
            width: 280px!important;

        }
        .conditionSearch .searchBtn{
            height: 30px;
            border-radius: 4px;
        }
        .conditionSearch{
            display: inline-block;
            border-radius: 4px;
            width: 50%;
        }
        .conditionSearch form{
            display: inline-block;
        }
        .conditionSearch{
            margin-top:0!important;
        }
        .mySpan{
            font-size: 20px;
        }
        .mexs{
            border: 1px solid #1d2088;
            border-radius: 4px;
            width: 60px;
            padding-left: 10px;
        }
        .pagination li.active span{
            color: #fff;
            margin-right: 0!important;
        }
        .tz{
            font-size: 20px;
        }
        .go{
            font-size: 20px;
        }
        .tip{
            width: 80px;
            font-size: 20px;
            color: #333;
        }
        .lqf{
            display: inline-block;
        }
        .lqfF{
            display: inline-block;
            float: left;
            margin-top: 5px;
            padding-left: 20px;
        }
        .pag{
            margin: -38px 0 24px;
        }
    </style>
</head>
<body>
<div class="LQ-huishouz">
    <div class="condition">
        <div class="condtionCont1">
            <form name="myform" method="post" action="/user/saler/mykehu">
                <div class="condtionArea">
                    <?php if(''==$intent): ?>
                    <span data-id="" class="getspanv3 current">所有客户</span>
                    <?php else: ?>
                <span data-id="" class="getspanv3">所有客户

                </span>
                    <?php endif; if(is_array($levels) || $levels instanceof \think\Collection || $levels instanceof \think\Paginator): $i = 0; $__LIST__ = $levels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['level']==$intent): ?>
                <span data-id="<?php echo $vo['level']; ?>" class="getspanv3 current"><?php echo $vo['level']; ?>
                    <div data-id="<?php echo $vo['id']; ?>" class="optionDel">-</div>
                </span>
                    <?php else: ?>
                <span data-id="<?php echo $vo['level']; ?>" class="getspanv3"><?php echo $vo['level']; ?>
                    <div data-id="<?php echo $vo['id']; ?>" class="optionDel">-</div>
                </span>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="optionAdd">+</div>
                <input name="intent" type="hidden" id="intent" value="">
            </form>
        </div>
    </div>
    <div class="conditionSearch">
        <form name="seache" method="post" action="#">
            <input class="searchBtn" type="submit" value="搜索"/>
            <input class="searchInput" type="text" placeholder="姓名/电话/省份/项目名" name="keyword" value="<?php echo $keyword; ?>" />
            <label class="mySpan">每页显示：</label><input name="pagenum" class="mexs" value="<?php echo $limit; ?>">
        </form>
    </div>
    <div class="reg_testdate" name="reg_testdate">
        <select>
            <option value="">导入</option>
            <option value="">单个导入</option>
        </select>
    </div>
    <div class="divHSZ">
        <span class="">通话记录</span>
        <a href="/user/saler/recycle/menu/1"><span>回收站</span></a>
        <a onclick="setAll(0,'/user/saler/del_guests')" href="javascript:;"><span>批量放弃</span></a>
    </div>


</div>
<table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="">
    <tbody>
    <tr align="center" bgcolor="#dcdcdc">
        <th><input id="all" type="checkbox" onclick="setCheckbox(this,'delid')" value="" /></th>
        <th>ID</th>
        <th>项目</th>
        <th>对象</th>
        <th>时间</th>
        <th>时长</th>
        <th>业务员</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($zylist) || $zylist instanceof \think\Collection || $zylist instanceof \think\Paginator): $i = 0; $__LIST__ = $zylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><input type="checkbox" name="delid" class="delid" value="<?php echo $vo['id']; ?>" /></td>
        <td><?php echo $vo['id']; ?></td>
        <td><?php echo $vo['project']; ?></td>
        <td><?php echo $vo['guest']; ?></td>
        <td><?php echo $vo['datetime']; ?></td>
        <td>00:05:36</td>
        <td><?php echo $saler; ?></td>
        <td>
            <span class=""><img class="approvalPhone" onclick="setPopData('<?php echo $vo['guest']; ?>','<?php echo $vo['province']; ?>','<?php echo $vo['project']; ?>','<?php echo $vo['company']; ?>','<?php echo $vo['tel']; ?>','<?php echo $vo['id']; ?>')" src="/static/images/ic_call.png" alt="电话" /></span>
            <span class=""><img class="approvalEmal" data-id="<?php echo $vo['tel']; ?>" src="/static/images/ic_.png" alt="手机" /></span>
            <span class=""><img class="approvalB" data-id="<?php echo $vo['id']; ?>" data-lv="<?php echo $vo['intent']; ?>" src="/static/images/ic_move.png" alt="操作" /></span>
            <span class=""><img class="approvalDel" data-id="<?php echo $vo['id']; ?>" src="/static/images/ic_delete.png" alt="删除" /></span>
            <a href="#"><span class=""><img class="approvalShopping" src="/static/images/ic_card.png" alt="购物车" /></span></a>
            <?php if($vo['label'] == 0): ?>
            <span class=""><img onclick="setPopData('<?php echo $vo['guest']; ?>','<?php echo $vo['province']; ?>','<?php echo $vo['project']; ?>','<?php echo $vo['company']; ?>','<?php echo $vo['tel']; ?>','<?php echo $vo['id']; ?>');" class="approvalP" src="/static/images/ic_tiaodong.png" alt="未联系" /></span>
            <?php else: ?>
            <span class=""><img onclick="setPopData('<?php echo $vo['guest']; ?>','<?php echo $vo['province']; ?>','<?php echo $vo['project']; ?>','<?php echo $vo['company']; ?>','<?php echo $vo['tel']; ?>','<?php echo $vo['id']; ?>');" class="approvalP" src="/static/images/label.png" alt="已联系" /></span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<div class="pag"><?php echo $page; ?></div>
<?php if(!(empty($page) || (($page instanceof \think\Collection || $page instanceof \think\Paginator ) && $page->isEmpty()))): ?>
<div class="lqfF">
    <form name="pageform" action="saler/mykehu" method="get" class="lqf">
        <label class="tz">跳转到第</label> <input class="tip" name="page" value="<?php echo $pagecurr; ?>"> <label class="tz">页</label>
        <input class="go" name="p1" type="submit" value="GO">
    </form>
</div>
<?php endif; ?>
<form name="delform" method="post">
<input name="ids" id="ids" type="hidden" value="">
</form>
<script>
    function setAll(m,url){
           var ids = getChecks("delid");
                if(ids && confirm("确认要批量操作勾选的信息吗？")) {
                   $("#ids").val(ids);
                   // alert(ids);
                   delform.action = url;
                   delform.submit();
                }
    }

    function call(number){
        if(number != '10086' && number !='10010'&& number !='0'){
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if(!myreg.test(number)) {
                alert('手机号码格式错误');
                return;
            }
        }
        var ws = new WebSocket('ws://127.0.0.1:50000');
        ws.onopen = function(event) {
            ws.send(number)
        };
        ws.onerror = function(event){
            alert('手机连接失败，请检查USB连接是否拔除，如果已重新连接USB，请等待一小会');
        }
        ws.onmessage = function(event) { //监听中
            var content = event.data;
            //返回输入的号码
            console.log('即将拔打:'+content)
            //用完就关
            ws.close();
        };
        ws.onclose = function(event){
            console.log('关闭连接');
        }
    }
</script>
<!--点击下拉框触发事件-->
<!--<div id="Tctable" class="popUps">
    <div class="mask"></div>
    <div class="popUpsCont">
        <div class="proposal">
            <p>单个导入</p>
            <table border="" cellspacing="0" cellpadding="0">
                <tr>
                    <th>项目</th>
                    <th>地区</th>
                    <th>时间</th>
                    <th>客户</th>
                    <th>意向</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="proposalBtn">
                <input class="certainBtn" type="button" value="确定导入"/>
                <input class="cancelBtn" type="button" value="取消导入"/>
            </div>
        </div>
    </div>
</div>-->

<!--编辑短信弹窗-->
<div class="popUps1">
    <div class="mask1"></div>
    <div class="popUpsCont1">
        <div class="proposal1">
            <span class="maskClose1">x</span>
            <p>正在编辑短信</p>
            <form name="sendmsg" method="post" action="/user/saler/sendmsg">
            <textarea name="message" id="message" placeholder="在此编辑内容"></textarea>
            <input name="email" type="hidden" id="email" value="">
            <div class="proposalBtn1">
                <input class="certainBtn1" type="button" value="发送">
                <input class="cancelBtn1" type="button" value="取消">
            </div>
            </form>
        </div>
    </div>
</div>
<!--放弃客户-->
<div class="popUps2">
    <div class="mask2"></div>
    <div class="popUpsCont2">
        <div class="proposal2">
            <span class="maskClose2">x</span>
            <p>确认放弃客户</p>
            <form name="delguest" method="post" action="/user/saler/del_guest">
            <div class="proposalBtn2">
                <input name="delid" id="delid" type="hidden" value="">
                <input name="uid" id="uid" type="hidden" value="<?php echo $uid; ?>">
                <input class="certainBtn2" type="button" value="放弃">
                <input class="certainBtn33" type="button" value="删除">
                <input class="cancelBtn2" type="button" value="取消">
            </div>
            </form>
        </div>
    </div>
</div>

<!--正在编辑分组-->
<div class="popUps3">
    <div class="mask3"></div>
    <div class="popUpsCont3">
        <div class="proposal3">
            <form name="setlevel" method="post" action="/user/saler/setlevel">
            <span class="maskClose3">x</span>
            <p>正在编辑分组</p>
            <div class="kehuFenzu">
                <div class="Felei">
                    <?php if(is_array($levels) || $levels instanceof \think\Collection || $levels instanceof \think\Paginator): $i = 0; $__LIST__ = $levels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <div data-id="<?php echo $vo['level']; ?>" id="lv<?php echo $key; ?>" class="Fenlei1"><?php echo $vo['level']; ?>
                            <div data-id="<?php echo $vo['id']; ?>" class="optionDel">-</div>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <span class="optionAdd">+</span>
                    <input name="intent" type="hidden" id="intent0" value="">
                    <input name="levelid" id="levelid" type="hidden" value="">
                    <input name="level" id="level" type="hidden" value="">
                </div>
            </div>
            <div class="proposalBtn3">
                <input class="certainBtn3" type="submit" value="确定">
                <input class="cancelBtn3" type="button" value="取消">
            </div>
            </form>
        </div>
    </div>
</div>
<!--通话记录弹窗-->
<div class="popUps4">
    <div class="mask4"></div>
    <div class="popUpsCont4">
        <div class="proposal4">
            <span class="maskClose4">x</span>
            <div class="ThjlTop">
                <span id="username" class="thName">赵杰</span>
					<span class="thlist">
						<p>地区：<label id="province">广东</label></p>
						<p>资源：<label id="project">一级建造师</label></p>
						<p>公司：<label id="company">广东御城建筑有限公司</label></p>
						<p>电话：<label id="phone">13265489725</label></p>
                        <input type="hidden" name="user_id" id="user_id" value="">
					</span>
            </div>
            <div class="ThjlCont">
                <div class="ThjlL">
                    <div class="ThjlBq">标签：</div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">工作地区：</span>
                        <div class="Bqlist">
                            <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
                            <div onclick="setlabels(this,'area')" class="gzdq area"><?php echo $vo['sheng']; ?></div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <span class="gzdqAdd">+</span>
                        </div>
                        <input type="hidden" name="area" id="area" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">需求人数：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'people')" class="gzdq people">1人</div>
                            <div onclick="setlabels(this,'people')" class="gzdq people">2-5人</div>
                            <div onclick="setlabels(this,'people')" class="gzdq people">5-10人</div>
                            <div onclick="setlabels(this,'people')" class="gzdq people">10人以上</div>
                        </div>
                        <input type="hidden" name="people" id="people" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">教育经历：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">高中及以下</div>
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">中专</div>
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">大专</div>
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">本科</div>
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">研究生</div>
                            <div onclick="setlabels(this,'edu')" class="gzdq edu">博士及以上</div>
                        </div>
                        <input type="hidden" name="edu" id="edu" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">培训经历：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'train')" class="gzdq train">有</div>
                            <div onclick="setlabels(this,'train')" class="gzdq train">无</div>
                        </div>
                        <input type="hidden" name="train" id="train" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">年龄层次：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'age')" class="gzdq age">25岁以下</div>
                            <div onclick="setlabels(this,'age')" class="gzdq age">25-30岁</div>
                            <div onclick="setlabels(this,'age')" class="gzdq age">30-35岁</div>
                            <div onclick="setlabels(this,'age')" class="gzdq age">35-40岁</div>
                            <div onclick="setlabels(this,'age')" class="gzdq age">40岁以上</div>
                        </div>
                        <input type="hidden" name="age" id="age" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">用户性别：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'sex')" class="gzdq sex">男</div>
                            <div onclick="setlabels(this,'sex')" class="gzdq sex">女</div>
                        </div>
                        <input type="hidden" name="sex" id="sex" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">岗位层级：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'capa')" class="gzdq capa">高层</div>
                            <div onclick="setlabels(this,'capa')" class="gzdq capa">中层</div>
                            <div onclick="setlabels(this,'capa')" class="gzdq capa">企业主</div>
                        </div>
                        <input type="hidden" name="capa" id="capa" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">项目需求：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'pros')" class="gzdq pros">一建</div>
                            <div onclick="setlabels(this,'pros')" class="gzdq pros">二建</div>
                            <div onclick="setlabels(this,'pros')" class="gzdq pros">消防</div>
                            <div onclick="setlabels(this,'pros')" class="gzdq pros">公路水运</div>
                            <div onclick="setlabels(this,'pros')" class="gzdq pros">湖南中共</div>
                        </div>
                        <input type="hidden" name="pros" id="pros" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">意向度：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'will')" class="gzdq will">A(要报班)</div>
                            <div onclick="setlabels(this,'will')" class="gzdq will">B(考虑中)</div>
                            <div onclick="setlabels(this,'will')" class="gzdq will">C(以后再说)</div>
                        </div>
                        <input type="hidden" name="will" id="will" value="">
                    </div>
                    <div class="ThjlBqName">
                        <span class="ThjlName">通话质量：</span>
                        <div class="Bqlist">
                            <div onclick="setlabels(this,'call')" class="gzdq call">通话良好</div>
                            <div onclick="setlabels(this,'call')" class="gzdq call">未接听</div>
                            <div onclick="setlabels(this,'call')" class="gzdq call">空号</div>
                        </div>
                        <input type="hidden" name="call" id="call" value="">
                    </div>
                    <div class="ThilInput">
                    	<ul id="label_ul">
                            <li>暂时无信息！</li>
                        </ul>
                        <textarea class="input" name="marks" placeholder="请在此处输入内容" id="marks"></textarea>
                        <div class="ThilBtn">
                            <!---<input class="tAdd" type="button" value="添加"/>--->
                            <input class="Bc" type="button"  onclick="return saveLabel()"  value="保存"/>
                        </div>
                    </div>
                    <div class="Luyin">
                        <input type="button"  value="播放录音"/>
                    </div>
                </div>
                <div class="ThjlR">
                    <div class="Thz">
                        <div class="Thtop">
                            <span></span>
                            <span>通话中</span>
                        </div>
                        <div class="thLz">
                            <span></span>
                            <span>通话录制中</span>
                        </div>
                    </div>
                    <div class="Duanxin">
                        <a href="#">
                            <span></span>
                            <span>短信</span>
                        </a>
                    </div>
                    <div class="Yidong">
                       <span></span>
                       <span>移动</span>
                    </div>
                    <div class="thDel">
                            <span></span>
                            <span>放弃</span>
                    </div>
                    <div class="thNext">
                        <span></span>
                        <span onclick="clicknext()">下一个 </span>
                    </div>
                    <div class="thXd">
                        <a href="#">
                            <span></span>
                            <span>下单</span>
                        </a>
                    </div>
                    <div class="thTf">
                        <a href="">
                            <span></span>
                            <span>退费</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--我的客户导入下拉框样式-->
<div id="Pil" class="popUps5" style="display: none;">
		<div class="mask5"></div>
		<div class="popUpsCont">
			<div class="proposal">
				<span class="maskClose">x</span>
				<p>导入</p>
            <form name="toExcel" enctype="multipart/form-data" action="/user/saler/importExcel" method="post">
				<div class="drMb">
					<div>一、模板下载：<a href="/template/template1.xlsx">《客户资源数据模板》 </a></div>
					<div>
                        二、上传已完成模板数据文件
                        <input type="file" name="excel">
                    </div>
				</div>
				<div class="proposalBtn1">
                    <input name="zytype" type="hidden" value="kecheng">
					<input class="startDr" type="submit" value="开始导入">
					<input class="cancelDr" type="button" value="取消导入">
				</div>
                </form>
			</div>
		</div>
        </div>

<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/checkbox.js"></script>
<script src="/static/js/table.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/addInput.js"></script>
<script>
    $('.condtionArea span').click(function(){
        $(this).addClass('current').siblings().removeClass();
        //var level = $(this).val();
        //$("#intent").val(level);
        //myform.submit();
    })
    //	我的客户/回收站页面 点击下拉框触发事件
    $('.LQ-huishouz select').change(function(){
//	alert($('.LQ-huishouz option:selected').html());
        $('#Pil').css('display','block');
    });
    $('#Pil .mask5').click(function(){
        $('#Pil').css('display','none');
    });
    $('#Pil .maskClose').click(function(){
        $('#Pil').css('display','none');    	
    })
    $('#Pil .cancelDr').click(function(){
        $('#Pil').css('display','none');
    })
    //点击短信弹出层
    $('.approvalEmal').click(function(){
        $('.popUps1').css('display','block');
        var email = $(this).data("id");
        $('#email').val(email);
    });
    $('.Duanxin').click(function(){
        $('.popUps1').css('display','block');
        var email = $(this).data("id");
        $('#email').val(email);
    });
    
    
    $('.maskClose1').click(function(){
        $('.popUps1').css('display','none');
    });
    $('.cancelBtn1').click(function(){
        $('.popUps1').css('display','none');
    });
    $('.mask1').click(function(){
         $('.popUps1').css('display','none');   	
    })
    $(".certainBtn1").click(function () {
        var email_url = $('#email').val();
        var message = $('#message').val();
        if(email_url.length>0 && message.length>0){
            sendmsg.submit();
        }
        else
       {
           alert("短信内容不能为空！");
       }
    });

    //切换通话记录及回收站切换效果
    $('.divHSZ span').click(function(){
        $(this).addClass('Hsz').siblings().removeClass('Hsz');
    });
    //点击删除客户按钮效果弹窗
    $('.approvalDel').click(function(){
        $('.popUps2').css('display','block');
        var delid = $(this).data("id");
        $('#delid').val(delid);
    });
    $('.maskClose2').click(function(){
        $('.popUps2').css('display','none');
    });
    $('.cancelBtn2').click(function(){
        $('.popUps2').css('display','none');
    });
    $('.thDel').click(function(){
        $('.popUps2').css('display','block');   	
    });
    $('.mask2').click(function(){
    	$('.popUps2').css('display','none');
    });

    $(".certainBtn33").click(function(){
        //if(confirm("确定要放弃客户吗？")){
        delguest.action="saler/delete";
        delguest.submit();
        //}
    });

    $(".certainBtn2").click(function(){
        //if(confirm("确定要放弃客户吗？")){
        var delid = $("#delid").val();
        var uid = $("#uid").val();
        $.ajax({
            type: "POST",
            url: "/user/saler/del_guest",
            //contentType: "application/json; charset=utf-8",
            data: {delid:delid,uid:uid},
            dataType: "json",
            success: function(res){
               //alert("操作成功！");
                $('.popUps2').css('display','none');
                clicknext();
            }
        });
       // delguest.submit();
        //}
    });

    //我的客户  点击加号 动态创建类别
    $('.condtionCont1 .optionAdd').click(function(){
          var str = '<input class="Fenlei0" value="">';
          $('.condtionArea').append(str);

        $('.Fenlei0').on("blur",function(){
            var level = $(this).val();
            $("#intent").val(level);
            if(level){
                myform.action = "/user/saler/saveClass";
                myform.submit();
            }
        });
    });

    //我的客户 点击分组弹窗效果
    $('.approvalB').click(function(){
        $('.popUps3').css('display','block');
        var levelid = $(this).data("id");
        var levellv = $(this).data("lv");
        $('#levelid').val(levelid);
        $(".Fenlei1").each(function(){
            if(levellv==$(this).html()){
                $(this).addClass('current').sibling().removeClass('current');
            }
        });
    });
    $('.maskClose3').click(function(){
        $('.popUps3').css('display','none');
    });

    $('.cancelBtn3').click(function(){
        $('.popUps3').css('display','none');
    });
    $('.Yidong').click(function(){
         $('.popUps3').css('display','block');   	
    })
    $('.mask3').click(function(){
         $('.popUps3').css('display','none');     	
    })

    //编辑分组窗台创建分组
    $('.Felei .optionAdd').click(function(){
        var ss = '';
        var str = '<input class="Fenlei0" value="'+ ss +'">';
        $(this).before(str);
        $('.Fenlei0').on("blur",function(){
            var fenlei = $(this).val();
            $("#intent0").val(fenlei);
            if(fenlei){
                setlevel.action = "/user/saler/saveClass";
                setlevel.submit();
            }
        });
    });

    $(".Fenlei1").each(function(){
        $(this).click(function(){
            $(".Fenlei1").each(function(){
                $(this).removeClass('current');
            });
            var lid = $(this).data("id");
            $("#level").val(lid);
            $(this).addClass('current');
            //setlevel.submit();
        });
    });

    //设置面板数据，主要用于点击下一个按钮时
function setPopData(username,province,project,company,phone,rid){
    $("#username").html(username);
    $("#province").html(province);
    $("#project").html(project);
    $("#company").html(company);
    $("#phone").html(phone);
    $("#user_id").val(rid);
    $("#delid").val(rid);
    $("#levelid").val(rid);
    $("#email").val(phone);
    $('.popUps4').css('display','block');
    getLabelist(rid);
    //call(phone);
}

    //初始化标签值
function resetPop(){
    $("#area").val("");
    $("#people").val("");
    $("#edu").val("");
    $("#train").val("");
    $("#age").val("");
    $("#sex").val("");
    $("#capa").val("");
    $("#pros").val("");
    $("#will").val("");
    $("#call").val("");
    $("#marks").val("");
    $('.ThjlBqName .Bqlist div').removeClass('current');
}

    function setPopstyle($list){
        //console.log($list);
        $(".area").each(function(){
            var area = $(this).html();
            for(var i in $list){
                if(area == $list[i]){
                    $(this).addClass('current');
                    $("#area").val(area);
                    break;
                }
            }
        });
        $(".people").each(function(){
            var people = $(this).html();
            for(var i in $list){
                if(people == $list[i]){
                    $(this).addClass('current');
                    $("#people").val(people);
                    break;
                }
            }
        });
        $(".edu").each(function(){
            var edu = $(this).html();
            for(var i in $list){
                if(edu == $list[i]){
                    $(this).addClass('current');
                    $("#edu").val(edu);
                    break;
                }
            }
        });
        $(".train").each(function(){
            var train = $(this).html();
            for(var i in $list){
                if(train == $list[i]){
                    $(this).addClass('current');
                    $("#train").val(train);
                    break;
                }
            }
        });
        $(".age").each(function(){
            var age = $(this).html();
            for(var i in $list){
                if(age == $list[i]){
                    $(this).addClass('current');
                    $("#age").val(age);
                    break;
                }
            }
        });
        $(".sex").each(function(){
            var sex = $(this).html();
            for(var i in $list){
                if(sex == $list[i]){
                    $(this).addClass('current');
                    $("#sex").val(sex);
                    break;
                }
            }
        });
        $(".capa").each(function(){
            var capa = $(this).html();
            for(var i in $list){
                if(capa == $list[i]){
                    $(this).addClass('current');
                    $("#capa").val(capa);
                    break;
                }
            }
        });
        $(".pros").each(function(){
            var pros = $(this).html();
            for(var i in $list){
                if(pros == $list[i]){
                    $(this).addClass('current');
                    $("#pros").val(pros);
                    break;
                }
            }
        });
        $(".will").each(function(){
            var will = $(this).html();
            for(var i in $list){
                if(will == $list[i]){
                    $(this).addClass('current');
                    $("#will").val(will);
                    break;
                }
            }
        });
        $(".call").each(function(){
            var call = $(this).html();
            for(var i in $list){
                if(call == $list[i]){
                    $(this).addClass('current');
                    $("#call").val(call);
                    break;
                }
            }
        });
        $(".marks").each(function(){
            var marks = $(this).html();
            for(var i in $list){
                if(marks == $list[i]){
                    $(this).addClass('current');
                    $("#marks").val(marks);
                    break;
                }
            }
        });
    }

//获取选中的标签数据
function getPopValue(){
    var area = $("#area").val();
    var people = $("#people").val();
    var edu = $("#edu").val();
    var train = $("#train").val();
    var age = $("#age").val();
    var sex = $("#sex").val();
    var capa = $("#capa").val();
    var pros = $("#pros").val();
    var will = $("#will").val();
    var call = $("#call").val();
    return {
        "area":area,
        "people":people,
        "edu":edu,
        "train":train,
        "age":age,
        "sex":sex,
        "capa":capa,
        "pros":pros,
        "will":will,
        "call":call
    };
}
//提交保存标签数据
 function saveLabel(){

        var label_values = getPopValue();
        var will = $("#will").val();
        //console.log(label_values);
        var id = $("#user_id").val();
        var marks = $("#marks").val();
         //if(marks.length == 0 || marks == '请在此处输入内容'){
             //alert("请输入内容！");
             //return false;
         //}
         //else
         //{
             $.ajax({
                 type: "GET",
                 url: "/user/saler/saveLabels",
                 //contentType: "application/json; charset=utf-8",
                 data: {id:id,labels:JSON.stringify(label_values),marks:marks,will:will},
                 dataType: "json",
                 success: function(res){
                     //console.log(res);
                     if(res.code){
                         resetPop();
                     }
                     else
                     {
                        //alert("提交失败！");
                     }
                     //alert(res.msg);
                     getLabelist(id);
                 }
             });
        // }
    }

//点击下一个按钮，请求数据
 function clicknext(){
     saveLabel();
     //saveLabel();
     var nextid = $("#user_id").val();
     if(nextid){
         $.ajax({
             type: "POST",
             url: "/user/saler/nextUser",
             data: {id:nextid},
             dataType: "text",
             success: function(res){
                 var data =  JSON.parse(res);
                 console.log(data);
                 if(data){
                     setPopData(data.guest,data.province,data.project,data.company,data.tel,data.id);
                     resetPop();
                     getLabelist(data.id);
                 }
                 else
                 {
                     alert("暂时无信息！");
                 }
             }
         });
     }
 }

function setlabels(obj,label){
    var old_label = $(obj).html();
    //alert(old_label);
    $("#"+label).val(old_label);
}
 //获取保存的备注列表
function getLabelist(rid){
        $.ajax({
            type: "GET",
            url: "/user/saler/getLabelist",
            //contentType: "application/json; charset=utf-8",
            data: {rid:rid},
            dataType: "json",
            success: function(json){
                //var res = JSON.parse(json);
                var result = json.data;

                var labellist = [];
                var labels = JSON.parse(json.label);

                for(k in labels){
                    labellist.push(labels[k]);
                }
                $('.gzdq').each(function(){
                    $(this).removeClass('current');
                });
                setPopstyle(labellist);
                if(json.code){
                    var tempst = '';
                    for(var i=0;i<result.length;i++){
                        //var res = JSON.parse(result);
                        tempst = tempst+"<li>"+result[i].datetime+"-"+result[i].uname+"："+result[i].marks+"</li>"
                    }
                   $("#label_ul").html(tempst);
                }
                else
                {
                    $("#label_ul").html('<li>暂时无内容</li>');
                }
            }
        });
    }

//通话记录弹出框
 $('.maskClose4').click(function(){
        $('.popUps4').css('display','none');
        location.reload(true);
    });
 $('.approvalP').click(function(){
        $('.popUps4').css('display','block');
    });

    //通话记录弹窗
    $('.gzdqAdd').click(function(){
        //var str = '<div class="gzdq">广东省</div>';
        //$(this).before(str);
    });

    $(".getspanv3").each(function(){
        $(this).click(function(){
            var temp = $(this).data("id");
            $("#intent").val(temp);
            myform.submit();
        })
    });
//  通话界面弹窗切换效果
$('.ThjlBqName .Bqlist div').click(function(){
	$(this).addClass('current').siblings().removeClass('current');
})
$('.tAdd').click(function(){
	$('.ThilInput .input').removeAttr("readonly");
    $("#marks").html('');
    $("#marks").focus();
});

/*$('.Bc').click(function(){
	$('.ThilInput .input').attr("readonly","readonly");
})*/
    $('.optionDel').click(function(){
        var id = $(this).data("id");
        var delobj = $(this).parent();
        var table = 'levels';
        //alert(id)
        if(id){
            var isdo = confirm("是否删除已经保存的数据？");
            if(isdo){
                 delobj.remove();
                 deloption(table,id,"/user/saler/del_lv");
            }
        }
        else
        {
            delobj.remove();
        }
    })
</script>
</body>
</html>
