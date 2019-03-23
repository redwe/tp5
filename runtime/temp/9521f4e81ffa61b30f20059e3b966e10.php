<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\phpStudy\WWW\CRM\public/../app/user\view\saler\order.html";i:1545459993;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>CRM主界面-销售员-订单管理</title>
    <link rel="stylesheet" href="/static/css/Seller.css" />
</head>
<body>
<div class="condition">
    <div class="conditionSearch">
        <input class="searchBtn" type="button" value="搜索"/>
        <input class="searchInput" type="text" />
    </div>
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
        <th>反馈</th>
    </tr>
    <?php if(is_array($orderlist) || $orderlist instanceof \think\Collection || $orderlist instanceof \think\Paginator): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo $vo['project']; ?></td>
        <td><?php echo $vo['province']; ?>-<?php echo $vo['city']; ?></td>
        <td><?php echo date("Y年m月d日",strtotime($vo['datetime'])); ?></td>
        <td><?php echo $vo['guest']; ?></td>
        <td><?php echo $vo['intent']; ?></td>
        <td><?php echo $vo['label']; ?></td>
        <td><?php if($vo['exam']==-1): ?>
            <span data-id="<?php echo $vo['sugges']; ?>" class="dingdanOverrule">
                <?php echo $vo['sugges']; ?>
            </span>
            <?php elseif($vo['exam']==1): ?>
            <span class="#">已批准</span>
            <?php else: ?>
            <span class="#">申请中</span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

<div class="popUps">
    <div class="mask"></div>
    <div class="popUpsCont">
        <div class="proposal">
            <span class="maskClose">x</span>
            <p>驳回意见</p>
            <textarea id="sugges" placeholder="用户信息不完善"></textarea>
            <!--<div class="proposalBtn">
                <input class="certainBtn" type="button" value="确定">
                <input class="cancelBtn" type="button" value="取消">
            </div>-->
        </div>
    </div>
</div>

<script src="/static/js/jquery-2.1.4.min.js"></script>
<script src="/static/js/fanxuan.js"></script>
<script src="/static/js/table.js"></script>
<script>
    //删除操作效果
    $('.zyDel').click(function(){
        $(this).parent().parent('ul').remove();
    })
//  $('.dingdanOverrule').click(function(){
//      var sugges = $(this).data("id");
//      $("#sugges").val(sugges);
//      $('.popUps').css('display','block');
//  })
//  //  关闭弹窗效果
//  $('.maskClose').click(function(){
//      $('.popUps').css('display','none');
//  })

</script>
</body>
</html>