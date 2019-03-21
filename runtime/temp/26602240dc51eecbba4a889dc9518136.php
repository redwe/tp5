<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\phpStudy\WWW\CRM\public/../app/admin\view\ziyuan\xueli.html";i:1544691212;s:44:"D:\phpStudy\WWW\CRM\app\admin\view\nav3.html";i:1545450599;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRM主界面-管理员-资源管理</title>
	</head>
	<link rel="stylesheet" href="/static/css/common.css" />
	<link rel="stylesheet" href="/static/css/index.css" />
<style type="text/css">
	.approvalTop ul li:last-child {
    	border-right: none;
    	width: 18%;
	}
	.approvalTop ul li{
		width: 11%;
	}
	.approvalTop ul li:nth-child(3) {
    	background: transparent;
	}
	.approvalTop ul li:nth-child(4) {
    	background: url(/static/images/ic_move1.png) no-repeat 140px;
    	background-size: contain;
	}
	.approvalCont ul input{
		width: 13px;
		height: auto;
	}
	.approvalCont ul li{
		width: 11%;
	}
	.approvalCont ul li:last-child {
    	width: 19%;
	}
	.selectionTop ul li{
		padding: 1px 10px;
	}
	.proposal{
		width: 450px;
		height: 280px;
	}
	.proposal p{
		font-size: 20px;
	}
</style>
	<body>
		<div class="selectionTop">
             <ul>
    <?php if((\think\Request::instance()->param('nav3') == '0')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/ziyuan/kecheng/nav3/0">课程</a> </li>
    <?php if((\think\Request::instance()->param('nav3') == '1')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/ziyuan/xueli/nav3/1">学历</a> </li>
    <?php if((\think\Request::instance()->param('nav3') == '2')): ?>
    <li class="current">
        <?php else: ?>
    <li>
        <?php endif; ?><a href="/admin/ziyuan/zhengshu/nav3/2">证书</a></li>
    <?php 
    if($authorid=='3'){
        if($hsz){
             echo '<input type="button" class="Hsz" id="recycle" value="回收站">';
        }
        else
        {
            echo '<input type="button" class="Hsz" style="background-color: #1d2088; color: #ffffff;" id="recycle" value="回收站">';
        }

    }
     ?>
</ul>
				
			</div>
        <form name="listform" method="post" action="/admin/ziyuan/xueli/nav3/1">
			<div class="selectionTop">
				<ul>
                    <?php if(is_array($xmlist) || $xmlist instanceof \think\Collection || $xmlist instanceof \think\Paginator): $i = 0; $__LIST__ = $xmlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($project == $vo['project']): ?>
                    <li class="current"><?php echo $vo['project']; ?></li>
                    <?php else: ?>
                    <li><?php echo $vo['project']; ?></li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <input class="hiDomain" name="project" id="project" type="hidden" value="">
					<input type="button" class="Dr" value="导入">
				</ul>
			</div>
			<div class="condition">
				<div class="conditionSearch">
					<input class="searchBtn" type="submit" value="搜索"/>
                    <input class="searchInput" name="keyword" type="text" value="<?php echo $keyword; ?>" />
					<div class="Dels">
						<span>操作：</span>
                        <?php if($hsz==1): ?>
                        <input type="button" onclick="delAll(200,'/admin/ziyuan/delzy')" value="批量删除200条"/>
                        <input type="button" onclick="delAll(500,'/admin/ziyuan/delzy')" value="批量删除500条"/>
                        <input type="button" onclick="delAll(0,'/admin/ziyuan/delzy')" value="删除所勾选客户"/>
                        <?php else: ?>
                        <input type="button" onclick="delAll(200,'/admin/ziyuan/del')" value="彻底删除200条"/>
                        <input type="button" onclick="delAll(500,'/admin/ziyuan/del')" value="彻底删除500条"/>
                        <input type="button" onclick="delAll(0,'/admin/ziyuan/del')" value="彻底删除勾选客户"/>
                        <?php endif; ?>
					</div>
				</div>
			</div>
         </form>
        <form name="delform" method="post" action="/admin/ziyuan/delzy">
        <table id="tb_3" cellspacing="0" cellpadding="2" width="100%" border="1">
            <tbody>
                <tr>
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
                    <td><input type="checkbox" name="delid" class="delid" value="<?php echo $vo['id']; ?>"/></td>
                    <td><?php echo $vo['project']; ?></td>
                    <td><?php echo $vo['province']; ?>-<?php echo $vo['city']; ?></td>
                    <td><?php echo $vo['datetime']; ?></td>
                    <td><?php echo $vo['guest']; ?></td>
                    <td><?php echo $vo['intent']; ?></td>
                    <td><?php echo $vo['label']; ?></td>
                    <td>
                        <?php if($vo['status']==1): ?>
                        <a href="/admin/ziyuan/delzy/id/<?php echo $vo['id']; ?>" class="zyDel">删除</a>
                        <?php else: ?>
                        <a href="/admin/ziyuan/restore/id/<?php echo $vo['id']; ?>" class="zyDel">还原</a> /
                        <a href="/admin/ziyuan/del/id/<?php echo $vo['id']; ?>" class="zyDel">彻底删除</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
               </tbody>
         </table>
            <?php echo $page; ?>
            <input name="ids" id="ids" type="hidden" value="">
        </form>
		<div class="popUps">
		<div class="mask"></div>
		<div class="popUpsCont">
			<div class="proposal">
				<span class="maskClose">x</span>
				<p>批量导入</p>
                <form name="toExcel" enctype="multipart/form-data" action="/admin/ziyuan/importExcel" method="post">
				<div class="drMb">
					<div>一、模板下载：<a href="/template/template1.xlsx">《客户资源数据模板》</a></div>
					<div>
                        二、上传已完成模板数据文件
                        <input type="file" name="excel" >
                    </div>
				</div>
				<div class="proposalBtn1">
                    <input name="zytype" type="hidden" value="xueli">
					<input class="startDr" type="submit" value="开始导入">
					<input class="cancelDr" type="button" value="取消导入">
				</div>
                </form>
			</div>
		</div>
        </div>
        <script src="/static/js/jquery-2.1.4.min.js"></script>
        <script src="/static/js/table.js"></script>
        <script src="/static/js/checkbox.js"></script>
            <script>
                $('.selectionTop ul li').click(function(){
                    $("#project").val($(this).html());
                    $(this).addClass('current').siblings().removeClass();
                })
                //资源管理页面全选、反选案例
                //计算次数，当 #food 7个都选中时，#all 也选中
                var num =0;
                //#all 全选框选中时，#food 全部选中
                $('#all').click(function(){
                    if((this.checked)){
                        $('.approvalCont ul li input:checkbox').prop('checked',true);
                    }else{
                        $('.approvalCont ul li input:checkbox').prop('checked',false);
                    }
                })
                //全部框都选中时，#all 也选中
                $('.approvalCont ul li input:checkbox').click(function(){
                    if(this.checked){
                        num++;
                    }else{
                        num--;
                    }
                    if($('.approvalCont ul li input:checked').length == $('.approvalCont ul li input').length){
                        $('#all').prop('checked',true);
                    }else{
                        $('#all').prop('checked',false);
                    }
                })
                //点击导入按钮，显示隐藏遮罩层
                $('.Dr').click(function(){
                    $('.popUps').css('display','block')
                })
                $('.cancelDr').click(function(){
                    $('.popUps').css('display','none')
                });
                $('.maskClose').click(function(){
                    $('.popUps').css('display','none')
                })
                //删除操作效果
                $('.zyDel').click(function(){
                    $(this).parent().parent('ul').remove();
                })
            </script>
	</body>
</html>