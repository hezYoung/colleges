<!doctype html>

<?php
session_start();
//echo "sessions:" . $_SESSION['username'];
if ($_SESSION['username'] == "" || $_SESSION['username'] == " ")
    header("location:../login.php");

$idd = $_GET['id'];

$serve = 'localhost:3306';
$username = 'root';
$password = '010923';
$dbname = 'stu';
$link = mysqli_connect($serve, $username, $password, $dbname);
mysqli_set_charset($link, 'UTF-8');
$ming = 'select * from college';
$result = mysqli_query($link, $ming);

?>

<html>

<head>
    <meta charset="utf-8">
    <title>添加学生信息</title>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <link href="../css/modify.css" rel="stylesheet" type="text/css">
    <link href="../css/base.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="head">
        <img id="img_head" src="../img/lie.png">
        <div id="logo">
            <p id="logo-text">学生管理系统</p>
        </div>
        <p id="user-text"><?php echo "用户:" . $_SESSION['username']; ?> </p>
        <a id="exit-text" href="login.php">退出</a>
    </div>
    <div id="nav">
        <p id="text_nav">导航</p>
        <div id="menu">
            <a id="menu-u0" href="../index.php">
                <img id="img-u0" src="../img/u0-0.png"></img>
                <p id="text-u0">首 页</p>
            </a>
            <a id="menu-u1" href="../admin.php">
                <img id="img-u1" src="../img/u1-1.png"></img>
                <p id="text-u1">管理员管理</p>
            </a>
            <a id="menu-u2" href="../college.php">
                <img id="img-u2" src="../img/u2-2.png"></img>
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
                <img id="img-u5" src="../img/u5.png"></img>
                <p id="text-u5">学生信息管理</p>
            </a>
        </div>
    </div>
    <div id="con">
        <form method="post" action="insert.php">
            <table>
                <tr>
                    <td colspan="3" id="tda"> 添加学生信息 </td>
                </tr>
                <tr>
                    <td>序号: <input readonly="readonly" name="id" type="text" value=" <?php echo $row['id']; ?> "></td>
                    <td>学号: <input name="student_num" type="text" value=" <?php echo $row['student_num']; ?> "></td>
                    <td>姓名: <input name="name" type="text" value=" <?php echo $row['name']; ?> "></td>
                </tr>
                <tr>
                    <td>手机号: <input name="phone_number" type="text" value=" <?php echo $row['phone_number']; ?> "></td>
                    <td>性别: <input name="sex" type="text" value=" <?php echo $row['sex']; ?> "></td>
                    <td>入学年份: <input name="year" type="text" value=" <?php echo $row['year']; ?> "></td>
                </tr>
                <tr>
                    <td>学院名: <select name="college_id" id="select_college">
                        <?php
                        while( $row = mysqli_fetch_array($result) ){
                            echo '<option value ="' . $row['id'] . '">' . $row['college_name'] . '</option>';
                        }
                        ?>
                        </select></td>
                    <td>专业: <select  id="select_major" name="major_id" ></select></td>
                    <td>班级: <select  id="select_class" name="class_id" ></select></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="确定">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
    <script>
        $(document).ready(function(){
           getData(); 
           getclassData();
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