<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\phpStudy\WWW\CRM\public/../app/user\view\saler\lingqu.html";i:1553244238;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CRM主界面-销售员-领取客户</title>
    <link rel="stylesheet" href="/static/css/common.css" />
    <link rel="stylesheet" href="/static/css/Seller.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/home.css"/>
<body>
<div class="condition">
    <form name="lqform" method="post" action="/user/saler/lingqu">
    <div class="condtionCont1">
        <span>地区：</span>
        <div class="condtionArea">
            <?php if(is_array($shenglist) || $shenglist instanceof \think\Collection || $shenglist instanceof \think\Paginator): $key = 0; $__LIST__ = $shenglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;if($province == $vo['sheng']): ?>
            <span data-id="<?php echo $vo['sheng']; ?>" class="getspanv1 current"><?php echo $vo['sheng']; ?></span>
            <?php else: ?>
            <span data-id="<?php echo $vo['sheng']; ?>" class="getspanv1"><?php echo $vo['sheng']; ?></span>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <input name="province" type="hidden" id="province" value="<?php echo $province; ?>">
        </div>
    </div>
    <div class="condtionCont1">
        <span>项目：</span>
        <div class="reg_testdate">
            <select name="project">
                <option value="">选择项目</option>
                <?php if(is_array($xmlist) || $xmlist instanceof \think\Collection || $xmlist instanceof \think\Paginator): $i = 0; $__LIST__ = $xmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($project == $vo['project']): ?>
                <option selected value="<?php echo $vo['project']; ?>"><?php echo $vo['project']; ?></option>
                <?php else: ?>
                <option value="<?php echo $vo['project']; ?>"><?php echo $vo['project']; ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name="xueli">
                <option value="">选择学历</option>
                <?php if(is_array($xmlist2) || $xmlist2 instanceof \think\Collection || $xmlist2 instanceof \think\Paginator): $i = 0; $__LIST__ = $xmlist2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                 <option value="<?php echo $vo2['project']; ?>"><?php echo $vo2['project']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name="zhengshu">
                <option value="">选择证书</option>
                <?php if(is_array($xmlist3) || $xmlist3 instanceof \think\Collection || $xmlist3 instanceof \think\Paginator): $i = 0; $__LIST__ = $xmlist3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo3['project']; ?>"><?php echo $vo3['project']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </div>
    <div class="condtionCont1">
        <span>时间：</span>
        <div class="condtionArea">
            <div>
                <span class="getspanv2 " data-id="7">本周</span>
                <span class="getspanv2" data-id="30">本月</span>
                <input name="day_num" type="hidden" id="day_num" value="">
            </div>

            <div class="Ftextdate" style="padding-top: 3px;">
                <div class="reg_testdate">
                    <select name="startY" id="startY" onChange="YYYYDD(this,this.value,'startD')">
                        <option value="">请选择 年</option>
                    </select>
                    <select name="startM" id="startM" onChange="MMDD(this,this.value,'startD')">
                        <option value="">选择 月</option>
                    </select>
                    <select name="startD" id="startD">
                        <option value="">选择 日</option>
                    </select>
                </div>
                <div class="Separator">—</div>
                <div class="reg_testdate">
                    <select name="endY" id="endY" onChange="YYYYDD(this,this.value,'endD')">
                        <option value="">请选择 年</option>
                    </select>
                    <select name="endM" id="endM" onChange="MMDD(this,this.value,'endD')">
                        <option value="">选择 月</option>
                    </select>
                    <select name="endD" id="endD">
                        <option value="">选择 日</option>
                    </select>
                </div>
                <!----<div class="timeBtn"><input type="button" value="确认"/></div>--->
            </div>
        </div>
    </div>
    <div class="condtionCont1">
        <span>意向：</span>
        <div class="condtionArea">
            <span data-id="A" class="getspanv3">A (要报班)</span>
            <span data-id="B" class="getspanv3 ">B (考虑中)</span>
            <span data-id="C" class="getspanv3">C (以后再说)</span>
            <input name="intent" type="hidden" id="intent" value="">
        </div>
    </div>
    <div class="conditionSearch">
        <input class="searchBtn" type="submit" value="搜索"/>
        <input class="searchInput" type="text" name="keyword" />
        <div class="Dels">
            <span>操作：</span>
            <input type="button" onclick="delAll(200,'/user/saler/lingzy')" value="批量领取200条"/>
            <input type="button" onclick="delAll(500,'/user/saler/lingzy')" value="批量领取500条"/>
            <input type="button" onclick="delAll(0,'/user/saler/lingzy')"  value="领取所勾选客户"/>
        </div>
    </div>
    </form>
</div>
<div class="condtionArea">
<form name="delform" method="post" action="/user/saler/delzy">
<table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
    <tbody>
    <tr align="center" bgcolor="#dcdcdc">
        <th><input id="all" type="checkbox" onclick="setCheckbox(this,'delid')" value="" /></th>
        <th>项目</th>
        <th>地区</th>
        <th>时间</th>
        <th>客户</th>
        <th>意向</th>
        <th>标签</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($zylist) || $zylist instanceof \think\Collection || $zylist instanceof \think\Paginator): $i = 0; $__LIST__ = $zylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><input type="checkbox" name="delid" class="delid" value="<?php echo $vo['id']; ?>" /></td>
        <td><?php echo $vo['project']; ?></td>
        <td><?php echo $vo['province']; ?>-<?php echo $vo['city']; ?></td>
        <td><?php echo $vo['datetime']; ?></td>
        <td><?php echo $vo['guest']; ?></td>
        <td><?php echo $vo['intent']; ?></td>
        <td><?php echo $vo['label']; ?></td>
        <td>
            <span class="span"><a href="/user/saler/dolingqu/id/<?php echo $vo['id']; ?>">领取</a></span>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php echo $page; ?>
<input name="ids" id="ids" type="hidden" value="">
</form>
</div>
<div class="popUps">
    <div class="mask"></div>
    <div class="popUpsCont">
        <div class="proposal">
            <span class="maskClose">x</span>
            <p>驳回意见</p>
            <textarea placeholder="用户信息不完善"></textarea>
            <!--<div class="proposalBtn">
                <input class="certainBtn" type="button" value="确定">
                <input class="cancelBtn" type="button" value="取消">
            </div>-->
        </div>
    </div>
</div>
<!--测试开始-->
<!--<div class="index-page">
	<div class="solution-more">
		<div class="solution-more-slide">
			<div class="container">
				<div class="hd">
					<ul>
						<li class="item-1 on">
							<a target="rightmain" href="/user/saler/lingqu/menu/0/nav2/0">领取客户</a>
						</li>
						<li class="item-2">
							<a target="rightmain" href="/user/saler/mykehu/menu/1/nav3/0">我的客户</a>
						</li>
						<li class="item-3">
							<a target="rightmain" href="/user/saler/order/menu/2/nav/0">订单管理</a>
						</li>
					</ul>
				</div>
			
			</div>
		
		</div>
	</div>
</div>-->
		
<!--测试结束-->
<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/checkbox.js"></script>
<script src="/static/js/table.js"></script>
<script src="/static/js/SuperSlide.js"></script>

<script>
    $('.condtionCont1 div span').click(function(){
        $(this).addClass('current').siblings().removeClass();
    });
    //  select样式调整
    $('.reg_testdate select').click(function(){
        $(this).toggleClass('current');
    });
    $(function(){
        YMDstart("startY","startM","startD");
        YMDstart("endY","endM","endD");
    });
    //	时间选择三级联动111
    function YMDstart(yid,mid,did){
        MonHead = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        var data = new Date();
        var now = data.getTime();   //获取当前时间毫秒
        //alert(now);
        //先给年下拉框赋内容
        var y  = data.getFullYear();
        var M = data.getMonth() + 1;
        var n = MonHead[data.getMonth()];

        for (var i = (y-30); i < (y+1); i++) //以今年为准，前30年，后30年
        {
            if(y==i){
                $("#"+yid).append("<option selected value='"+i+"'>"+ i +" 年</option>");
            }else{
                $("#"+yid).append("<option value='"+i+"'>"+ i +" 年</option>");
            }
        }
        //赋月份的下拉框
        for (var i = 1; i < 13; i++)
        {
            if(M==i){
                $("#"+mid).append("<option selected value='"+i+"'>"+ i +" 月</option>");
            }else{
                $("#"+mid).append("<option value='"+i+"'>"+ i +" 月</option>");
            }
        }
        if (M == 1 && IsPinYear(y)) n++;
        writeDay(n,did);
    }
    function YYYYDD(s1,str,did) //年发生变化时日期发生变化(主要是判断闰平年)
    {
        var MMvalue = s1.options[s1.selectedIndex].value;
        if (MMvalue == ""){ optionsClear(did); return;}
        var n = MonHead[MMvalue - 1];
        if (MMvalue ==2 && IsPinYear(str)) n++;
        writeDay(n,did)
    }
    function MMDD(s1,str,did)   //月发生变化时日期联动
    {
        var YYYYvalue = s1.options[s1.selectedIndex].value;
        if (YYYYvalue == ""){ optionsClear(did); return;}
        var n = MonHead[str - 1];
        if (str ==2 && IsPinYear(YYYYvalue)) n++;
        writeDay(n,did)
    }
    function IsPinYear(year)//判断是否闰平年
    {
        return (0 == year%4 && (year%100 !=0 || year%400 == 0));
    }
    function writeDay(n,did){
        var d = new Date().getDate();
        for (var i = 1; i <= n; i++) {
            if(i==d){
                $("#"+did).append("<option selected value='"+i+"'>"+ i +" 日</option>");
            }
            else
            {
                $("#"+did).append("<option value='"+i+"'>"+ i +" 日</option>");
            }
        }
    }
    function optionsClear(id)
    {
        $("#"+id).empty();
    }
//获取span的值地区
    $(".getspanv1").each(function(){
        $(this).click(function(){
            var temp = $(this).html();
            $("#province").val(temp);
            lqform.submit();
        })
    });

    //获取span的值时间
    $(".getspanv2").each(function(){
        $(this).click(function(){
            var temp = $(this).data("id");
            $("#day_num").val(temp);
        })
    });

    //获取span的值意向
    $(".getspanv3").each(function(){
        $(this).click(function(){
            var temp = $(this).data("id");
            $("#intent").val(temp);
        })
    })
    
//  侧边栏动画效果
//	$(".solution-more-slide").slide({
//		effect: 'fold'
//	});
	$(".solution-more-slide").slide({
		effect: 'fold'
	});

</script>
</body>
</html>