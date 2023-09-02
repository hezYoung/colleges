<?php
header("Content-type:text/html;charset=utf-8"); //设置文件编码格式
$host = "localhost";
$username = "root";
$password = "010923";
$dbName="stu";
session_start();
$conn = mysqli_connect($host, $username, $password,$dbName)or die("连接数据库失败！" .mysqli_error());
if(@ $_POST["login"] == "登录")
{
    $x=$_POST["username"];
    $v=$_POST["password"];
    $captcha=$_POST["captcha"];

    $a=mysqli_query($conn,"select * from admin where user_name='{$x}' and password='{$v}'");
    $row = mysqli_fetch_array($a);
    if($captcha != $_SESSION['captcha']){
        echo "验证码不对,正确的是：".$_SESSION['captcha'];
        exit();
    }
    if(empty($row)){
        echo  '用户输入的密码错误';
    }else{
        //  当验证通过后，启动 Session
        session_start();
        $_SESSION['username']=$row['user_name'];
        $_SESSION['password']=$row['password'];
        echo '用户输入的密码正确';
        sleep(2);
        session_start();
        $_SESSION['id']=2;
        sleep(2);
        header('Location:../index.php');
        echo "<script type='text/javascript'>alert('登陆成功');</script>";
    }
}

//$showtime = date("Y-m-d H:i:s");
//unset($_SESSION['username']);
//$serve = 'localhost:3306';
//$username = 'root';
//$password = '010923';
//$dbname = 'stu';
//$link = mysqli_connect($serve, $username, $password, $dbname);
//mysqli_set_charset($link, 'UTF-8');
//$username = $password = "";
//$ad = 2;
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $username = test_input($_POST["username"]);
//    $password = test_input($_POST["password"]);
//    $captcha = test_input($_POST["captcha"]);
//    $ming = 'select * from admin where user_name=\'';
//    $ming = $ming . $username . '\' and password=\'' . $password . '\'';
//    //echo $ming;
//    $result = mysqli_query($link, $ming);
//    $row = mysqli_fetch_array($result);
//
//    if ($row['user_name'] == $username && $row['password'] == $password && $username != "") {
//        session_start();
//        $_SESSION['username'] = $username;
//        if ($username != "")
//            $ad = 0;
//        $sql = "UPDATE admin SET last_time = '" . $showtime . "' WHERE user_name = '" . $username . "' ";
//        mysqli_query($link, $sql);
//        header("location:index.php");
//    } else if ($username == "" || $password == "") {
//
//        echo "<script>layer.msg('账号密码不能为空！！！', function(){  $(\"#text-one\").fadeOut(700);
//                $(\"#text-two\").fadeOut(800);
//                $(\"#text-three\").fadeOut(900);
//                $(\"#login\").fadeIn(1000);});</script>";
//    } else {
//        echo "<script>layer.msg('密码错误，请重新登录！！！', function(){  $(\"#text-one\").fadeOut(700);
//                $(\"#text-two\").fadeOut(800);
//                $(\"#text-three\").fadeOut(900);
//                $(\"#login\").fadeIn(1000);});</script>";
//    }
//}
//function test_input($data)
//{
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
//}


?>