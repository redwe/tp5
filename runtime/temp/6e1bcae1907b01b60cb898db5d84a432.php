<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\phpStudy\WWW\CRM\public/../app/user\view\login\index.html";i:1544594353;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link type="text/css" rel="stylesheet" href="/static/css/main.css">
    <style>
        body{ background:#556fb5; }
        table td{ border: 0px; }
    </style>
</head>
<body>
<div style="width: 560px; padding: 30px; margin: auto; margin-top: 200px; background-color:#336699; border: #113366 1px solid">
    <h1 style="color: #fff; text-align: center">销售员后台登录</h1>
    <form name="loginform" action="/user/login/dologin" method="post">
<table style="border: 0px; width: 100%">
    <tr>
        <td>用户名：</td><td><input type="text" name="uname" value=""></td>
   </tr>
    <tr>
        <td>密 码：</td><td><input type="password" name="password" value=""></td>
    </tr>
    <tr>
        <td> </td><td><input style="background-color: #113366; color: #fff; border: 0px;" type="submit" name="b1" value=" 登 录 "></td>
    </tr>
</table>
    </form>
</div>

</body>
</html>