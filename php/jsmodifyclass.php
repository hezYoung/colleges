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
    $ming='select * from major,college,class where class.id=' . $idd . ' and class.college_id=college.id and class.major_id=major.id';
    $result = mysqli_query($link,$ming);
    $row = mysqli_fetch_array($result); 
    
?>

<html>
<head>
<meta charset="utf-8">
<title>修改班级信息</title>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <link href="../css/modifyclass.css" rel="stylesheet" type="text/css">
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <link href="../css/class.css" rel="stylesheet" type="text/css">
    <link href="../js/layui/css/layui.css" rel="stylesheet" type="text/css">
<!--    <link href="../css/modifymajor.css" rel="stylesheet" type="text/css">-->
<!---->
<!--    <link href="../css/modifyadmin.css" rel="stylesheet" type="text/css">-->

</head>

<body>
<div id="nav">
    <p id="text_nav" >导航</p>
    <div id="menu" >
        <a id="menu-u0" href="../teaindex.php">
            <img id="img-u0" src="../img/u0-0.png" ></img>
            <p id="text-u0">首 页</p>
        </a>
        <a id="menu-u1" href="../jscollege.php">
            <img id="img-u2" src="../img/u2-2.png" ></img>
            <p id="text-u2">学院管理</p>
        </a>
        <a id="menu-u2" href="../jsmajor.php">
            <img id="img-u3" src="../img/u3-3.png" ></img>
            <p id="text-u3">专业管理</p>
        </a>
        <a id="menu-u3" href="../jsclass.php">
            <img id="img-u4" src="../img/u4.png" ></img>
            <p id="text-u4">班级管理</p>
        </a>
        <a id="menu-u4" href="../jsstudent.php">
            <img id="img-u5" src="../img/u5-5.png" ></img>
            <p id="text-u5">学生信息管理</p>
        </a>
    </div>
</div>
<div id="dw">
    <div id="can_title" >
        <h2 id="can_text">修改 <?php echo $row['major_name']; ?> 班级信息</h2>
        <p id="can_text2">谨慎修改 无法撤销</p>
    </div>
    <div id="can">
<!--        <form method="post" action="modclass.php">-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <td colspan="3" id="tda" >修改&nbsp;&nbsp;--><?php //echo $row['major_name']; ?><!--&nbsp;&nbsp;班级的信息</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>id:    <input readonly="readonly" name="id" type="text" value=" --><?php //echo $idd; ?><!-- "></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>学院名:    <input readonly="readonly" type="text" value=" --><?php //echo $row['college_name']; ?><!-- "></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>专业名:    <input readonly="readonly" type="text" value=" --><?php //echo $row['major_name']; ?><!-- "></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>班级名:    <input name="class_name" type="text" value=" --><?php //echo $row['class_name']; ?><!-- "></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td colspan="7"><input id="button" type="submit" value="确定" ></td>-->
<!--                </tr>-->
<!--            </table>-->
            <form method="post" action="jsmodclass.php" class="layui-form">
                <table>
                    <tr>
                        <td id="td1"><h1 style="color:#6c757d;">id:</h1>
                            <br>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input class="layui-input" readonly="readonly" style="margin-left: -50px;" name="id" type="text" value=" <?php echo $idd; ?> ">
                                    <br>
                                    <br>
                                    <p id="td-text">不可修改</br>
                                        &nbsp;</p>
                                </div>
                            </div></td>
                        <td id="tdd">&nbsp;</td>
                        <td id="td1"><h1 style="color:#6c757d;margin-top: -30px;">学院名:</h1>

                            <br>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input class="layui-input" readonly="readonly" style="margin-left: -50px;" name="college_name" type="text" value=" <?php echo $row['college_name']; ?> ">
                                    <br>
                                    <br>
                                    <p id="td-text">不可修改</p>
                                </div>
                            </div></td>
                        <td id="tdd">&nbsp;</td>
                        <td id="td1"><h1 style="color:#6c757d;margin-top: -30px;">专业名:</h1>

                            <br>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input class="layui-input" name="major_name" style="margin-left: -50px;" readonly="readonly" type="text" value=" <?php echo $row['major_name']; ?> ">
                                    <br>
                                    <br>
                                    <p id="td-text">不可修改</p>
                                </div>
                            </div></td>
                        <td id="tdd">&nbsp;</td>

                    </tr>
                    <tr>
                        <td id="td1"><h1 style="color:#6c757d;margin-top: -30px;">班级名:</h1>

                            <br>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input class="layui-input" name="class_name" style="margin-left: -50px;" type="text" value=" <?php echo $row['class_name']; ?> ">
                                    <br>
                                    <br>
                                    <p id="td-text">请输入班级号</p>
                                </div>
                            </div></td>
                    </tr>
                    <tr id="trr"></tr>
                    <tr>
                        <td colspan="3"><input id="button" type="submit" value="确定" ></td>
                    </tr>
                </table>
            </form>

    </div>
    
</body>
</html>