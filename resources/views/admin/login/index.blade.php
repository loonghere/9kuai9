<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>欢迎登录后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/admin/login.css">
    <script type="text/javascript" src="/assets/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/cloud.js"></script>
    <script language="javascript">
        $(function(){
            $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            $(window).resize(function(){
                $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
            });
            $('#username').focus();
        });
        $(document).keyup(function(event){
            if(event.keyCode == 13){
                login();
            }
        });
        function login() {
            var username = $('#username').val();
            var password = $('#password').val();
            if ($.trim(username) == '') {
                alert('请输入登陆用户名！');
                return false;
            }
            if ($.trim(password) == '') {
                alert('请输入登陆密码！');
                return false;
            }
            $('#login').submit();
        }
    </script>
</head>
<body style="background-color:#1c77ac; background-image:url(/assets/images/admin/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
    <div id="mainBody">
        <div id="cloud1" class="cloud"></div>
        <div id="cloud2" class="cloud"></div>
    </div>
    <div class="logintop">
        <span>欢迎登录后台管理界面平台</span>
        <ul>
            <li>
                <a href="/">返回首页</a>
            </li>
        </ul>
    </div>
    <div class="loginbody">
        <span class="systemlogo"></span>
        <div class="loginbox">
          <form id="login" action="/admin/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul>
                <li>
                    <input type="text" id="username" name="username" class="loginuser">
                </li>
                <li>
                    <input name="password" id="password" type="password" class="loginpwd" value="" onclick="javascript:this.value=''"/>
                </li>
                <li>
                    <input type="button" class="loginbtn" value="登陆" onclick="login();">
                </li>
            </ul>
          </form>
        </div>
    </div>
    <div class="loginbm">版权所有 2016 9kuai9</div>
</body>
</html>