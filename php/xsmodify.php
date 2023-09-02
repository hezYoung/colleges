<!doctype html>

<?php
session_start();
//echo "sessions:" . $_SESSION['username'];
if($_SESSION['username']=="" || $_SESSION['username']==" ")
    header("location:../login.php");

$idd=$_GET['id'];
//    echo "<script>alert('" . $idd . "');</script>";
$serve = 'localhost:3306';
$username = 'root';
$password = '010923';
$dbname = 'stu';
$link = mysqli_connect($serve,$username,$password,$dbname);
mysqli_set_charset($link,'UTF-8');
$ming='select * from student,class,major,college where student.id=' . $idd . ' and student.class_id=class.id and student.major_id=major.id and student.college_id = college.id';
//echo "<script>alert('" . $ming . "');</script>";
$result = mysqli_query($link,$ming);
$row = mysqli_fetch_array($result);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <link href="../css/modify.css" rel="stylesheet" type="text/css">
    <link href="../css/base.css" rel="stylesheet" type="text/css">
    <link href="../js/layui/css/layui.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="nav">
    <p id="text_nav" >导航</p>
    <div id="menu" >
        <a id="menu-u0" href="../stuindex.php">
            <img id="img-u0" src="../img/u0.png" class="layui-anim layui-anim-up"></img>
            <p id="text-u0" class="layui-anim layui-anim-up">首 页</p>
        </a>

        <a id="menu-u1" href="../xsstudent.php"> <img id="img-u5" src="../img/u5-5.png"></img>
            <p id="text-u5">学生信息管理</p>
        </a>
    </div>
</div>

<div id="dw">
    <div id="head"> <img id="img_head" src="../img/lie.png">
        <p id="user-text"  ><?php echo "Hi," . $_SESSION['username']; ?> </p>
    </div>
    <div id="con">
        <p id="tda">学生信息管理</p>
    </div>
    <div id="can_title" >
        <h2 id="can_text">修改 <?php echo $row['name']; ?> 学生信息</h2>
        <p id="can_text2">谨慎修改 无法撤销</p>
    </div>
    <div id="can">
        <form method="post" action="xsmod.php">
            <table >

                <tr>
                    <td>序号:    <input class="layui-input" style="text-align: center" readonly="readonly" name="id" type="text" value=" <?php echo $idd; ?> "></td>
                    <td>学号:    <input class="layui-input" style="text-align: center" name="student_num" type="text" value=" <?php echo $row['student_num']; ?> "></td>
                    <td>姓名:    <input class="layui-input" style="text-align: center" name="name" type="text" value=" <?php echo $row['name']; ?> "></td>
                </tr>
                <tr>
                    <td>手机号:  <input class="layui-input" style="text-align: center" name="phone_number" type="text" value=" <?php echo $row['phone_number']; ?> "></td>
                    <td>性别:    <input class="layui-input" style="text-align: center" name="sex" type="text" value=" <?php echo $row['sex']; ?> "></td>
                    <td>入学年份: <input class="layui-input" style="text-align: center" name="year" type="text" value=" <?php echo $row['year']; ?> "></td>
                </tr>
                <tr id="abc">
                    <td id="td_aa">学院:  <input class="layui-input" style="text-align: center" readonly="readonly" name="college_id" type="text" value=" <?php echo $row['college_name']; ?> "></td>
                    <td id="td_bb">专业:    <input class="layui-input" style="text-align: center" readonly="readonly" name="major_id" type="text" value=" <?php echo $row['major_name']; ?> "></td>
                    <td id="td_cc">班级: <input class="layui-input" style="text-align: center" readonly="readonly" name="class_id" type="text" value=" <?php echo $row['class_name']; ?> "></td>
                </tr>
                <tr>
                    <td colspan="3" id="aa">
                        <button id="bb" type="button" οnclick="#">修改学院等信息</button>
                    </td>
                </tr>
                <tr>
                    <td id="td_a">学院名: <select name="college_id" id="select_college">
                            <?php

                            $ming2 = 'select * from college';
                            $result2 = mysqli_query($link,$ming2);
                            while( $row2 = mysqli_fetch_array($result2) ){
                                echo '<option value ="' . $row2['id'] . '">' . $row2['college_name'] . '</option>';
                            }
                            ?>
                        </select></td>
                    <td id="td_b">专业: <select  id="select_major" name="major_id" ></select></td>
                    <td id="td_c">班级: <select  id="select_class" name="class_id" ></select></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="确定" >
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
<script>
    $(document).ready(function(){
        $("#td_a").hide();
        $("#td_b").hide();
        $("#td_c").hide();
        $("#bb").click(function () {
            getData();
            getclassData();
            $("#aa").hide();
            $("#td_a").show();
            $("#td_b").show();
            $("#td_c").show();

            var parent=document.getElementById("abc");
            var son=document.getElementById("td_aa");
            parent.removeChild(son);
            var son1=document.getElementById("td_bb");
            parent.removeChild(son1);
            var son2=document.getElementById("td_cc");
            parent.removeChild(son2);


        });
    });

    $("#select_college").change(function(){
        //alert("123");
        getData();
    });

    $("#select_major").change(function(){
        //alert("123");
        getclassData();
    });

    function getData(){
        college_date = $('#select_college').val();
        $.ajax({
            type:"post",
            url:"college_date.php",
            dataType:'json',
            data:{college_date:college_date},
            success:function(data){
                console.log("data: "+data);
                $('#select_major').empty();
                console.log(data.length);
                for(var i = 0;i<data.length;i++){
                    $('#select_major').append("<option value=\"" + data[i]['id'] + "\">"
                        + data[i]['major_name'] +"</option>");
                    console.log("major: <option value=\"" + data[i]['id'] + "\">"
                        + data[i]['major_name'] +"</option>");
                }
            }
        });
    }

    function getclassData(){
        //alert("123");
        major_date = $('#select_major').val();
        if(major_date==null)
            major_date=1;
        console.log("major_date:" + major_date)
        $.ajax({
            type:"post",
            url:"class_date.php",
            dataType:'json',
            data:{major_date:major_date},
            success:function(data){
                console.log("classdata: "+data);
                $('#select_class').empty();
                console.log(data.length);
                for(var i = 0;i<data.length;i++){
                    $('#select_class').append("<option value=\"" + data[i]['id'] + "\">"
                        + data[i]['class_name'] +"</option>");
                    console.log("class: <option value=\"" + data[i]['id'] + "\">"
                        + data[i]['class_name'] +"</option>");
                }
            }
        });
    }
</script>
</html>
