<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\phpStudy\WWW\CRM\public/../app/admin\view\users\password.html";i:1544577450;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link type="text/css" rel="stylesheet" href="/static/css/main.css">
</head>
<body>
<div class="main_bg">
    <h1 style="text-align: center">修改密码</h1>
    <form name="loginform" action="/admin/users/dopassword" method="post">
<table width="100%">
    <tr>
        <td>登录账号：</td><td><input type="text" name="uid" value=""></td>
   </tr>
    <tr>
        <td>原 密 码：</td><td><input name="oldpass" value=""></td>
    </tr>
    <tr>
        <td>新 密 码：</td><td><input name="newpass" value=""></td>
    </tr>
    <tr>
        <td>确认密码：</td><td><input name="repass" value=""></td>
    </tr>
    <tr>
        <td> </td><td><input type="submit" name="b1" value=" 保 存 "></td>
    </tr>
</table>
    </form>
</div>

</body>
</html>