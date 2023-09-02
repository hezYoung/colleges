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
        sleep(2);
        session_start();
        $_SESSION['id']=2;
        header('Location:../stuindex.php');
        echo "<script type='text/javascript'>alert('登陆成功');</script>";
    }
}
?>

