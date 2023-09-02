<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <title>学生管理系统</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.particleground.js"></script>
    <script type="text/javascript" src="js/demo.js"></script>
    <script type="text/javascript" src="js/layer/layer.js"></script>
    <link href="../js/layui/css/layui.css" rel="stylesheet" type="text/css">
    <link href="../css/modifymajor.css" rel="stylesheet" type="text/css">
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <script>
        console.log(navigator.userAgent);
        var u_agent = navigator.userAgent;
        if (u_agent.indexOf('Edge') > -1) {
            layer.msg('推荐使用支持WebKit的浏览器进行访问，如Chrome，Safari等');
        }

        $(document).ready(function () {
            $("#login").hide();
            $("#particles").click(function aa() {
                $("#text-one").fadeOut(500);
                $("#text-two").fadeOut(500);
                $("#text-three").fadeOut(500);
                $("#login").fadeIn(500);
            });
        });
    </script>
</head>

<body>

<div id="particles">

    <h1 id="text-one">学生管理系统</h1>
    <h1 id="text-two"></h1>
    <h1 id="text-three">点击任意处登录</h1>

    <div id="login">
        <p id="login-text-1">登录</p>
        <p id="login-text-2">Welcome back</p>
        <form method="post" action="php/jslogin.php">
            <p id="nametext">账号</p>
            <input type="text" name="username" placeholder="请输入你的用户名或者账号"><br>
            <p id="pswtext">密码</p>
            <input type="text" name="password" placeholder="请输入密码"></br></br>
            <div class="form-group">
                <div class="field">
                    <input type="text" style="width: 60%;" class="input input-big" name="captcha" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                    <img src="php/captcha.php" alt="" width="100" height="40" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'+Math.random();">

                </div>
            </div>
            <input type="submit" name="login" value="登录"><br>

        </form>

    </div>
</div>
</body>
</html>
