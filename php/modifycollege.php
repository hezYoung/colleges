<!doctype html>

<?php
    session_start();
    //echo "sessions:" . $_SESSION['username'];
    if($_SESSION['username']=="" || $_SESSION['username']==" ")
        header("location:../login.php");
    
    $idd=$_GET['id'];

    $serve = 'localhost:3306';
    $username = 'root';
$password = '010923';
$dbname = 'stu';
    $link = mysqli_connect($serve,$username,$password,$dbname);
    mysqli_set_charset($link,'UTF-8');
    $ming='select * from college where id=' . $idd;
    $result = mysqli_query($link,$ming);
    $row = mysqli_fetch_array($result); 
    
?>

<html>
<head>
<meta charset="utf-8">
<title>修改学院信息</title>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <link href="../css/modifycollege.css" rel="stylesheet" type="text/css">
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <style>
        #can{
            background-color: #f4f6f9;
            box-shadow: 0 0px 0px #f4f6f9;
        }
    </style>
</head>

<body>
  
    <div id="nav">
        <p id="text_nav">MENU</p>
        <div id="menu">
            <a id="menu-u0" href="../index.php">
                <img id="img-u0" src="../img/u0-0.png"></img>
                <p id="text-u0">首 页</p>
            </a>
            <a id="menu-u1" style=" position: absolute;
    background-color: #FFFFFF;
    width: 240px;
    height: 70px;
    top: 70px;
    left: 10px;" href="../admin.php">
                <img id="img-u1" src="../img/u1-1.png"></img>
                <p id="text-u1">管理员管理</p>
            </a>
            <a id="menu-u2" style="position: absolute;
    background-color: #6777ef;
    width: 240px;
    height: 70px;
    top: 140px;
    left: 10px;" href="../college.php">
                <img id="img-u2" src="../img/u2.png"></img>
                <p id="text-u2">学院管理</p>
            </a>
            <a id="menu-u3" href="../major.php">
                <img id="img-u3" src="../img/u3-3.png"></img>
                <p id="text-u3">专业管理</p>
            </a>
            <a id="menu-u4" href="../class.php">
                <img id="img-u4" src="../img/u4-4.png"></img>
                <p id="text-u4">班级管理</p>
            </a>
            <a id="menu-u5" href="../student.php">
                <img id="img-u5" src="../img/u5-5.png"></img>
                <p id="text-u5">学生信息管理</p>
            </a>
        </div>
    </div>

    <div id="dw">
        <div id="head">
            <img id="img_head" src="../img/lie.png">
            <p id="user-text"  ><?php echo "Hi," . $_SESSION['username']; ?> </p>
        </div>
        <div id="con">
            <p id="tda">学院管理</p>
        </div>
        
        <div id="can_title" >
            <h2 id="can_text">修改 <?php echo $row['college_name']; ?> 信息</h2>
            <p id="can_text2">谨慎修改</p>
        </div>
        
        <div id="can">
        <form method="post" action="modcollege.php">
            <table>
                <tr>
                    <td id="td1"><h1 style="color:#6c757d;">id</h1> <br>    <input readonly="readonly" name="id" type="text" value=" <?php echo $row['id']; ?> "><br><br>
                     <p id="td-text" style="margin-left: 55px;">不可修改。</br>&nbsp;</p></td>
                    <td id="tdd">&nbsp;</td>
                    <td id="td1"><h1 style="color:#6c757d;">学院名</h1><br>     <input name="college_name" type="text" value=" <?php echo $row['college_name']; ?> "><br><br>
                    <p id="td-text" style="margin-left: 55px;">可由1—30个汉字或字母字符组成。</br>&nbsp;</p></td>
                </tr>
                <tr id="trr"></tr>
                <tr>
                    <td colspan="3">
                        <input id="button" type="submit" value="确定" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </div>
</body>
</html>