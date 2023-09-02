<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    html{
        height: 98%;
    }
body{
    background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    width: 100%;
    height: 100%;
}
    a{
        text-decoration: none;
    }
    .card {
        width: 190px;
        height: 120px;
        transition: all .5s;
        box-shadow: 15px 15px 30px rgba(25, 25, 25, 0.11),
        -15px -15px 30px rgba(60, 60, 60, 0.082);
        text-align: center;
        overflow: hidden;
        margin: 0 auto;
        margin-top: 120px;
    }

    .card:hover {
        height: 294px;
        background: linear-gradient(360deg, #edededc5 60%, hsla(0, 0%, 13%, 1) 70%);
    }

    .card .header {
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #212121;
        margin-bottom: 16px;
    }

    .card .header .img-box {
        width: 50px;
    }

    .card .header .title {
        font-size: 1.1em;
        letter-spacing: .1em;
        font-weight: 500;
        text-transform: uppercase;
        padding: 4px 0 14px 0;
        transition: all .5s;
        color: #edededc5;
    }

    .card:hover .header {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 96%);
    }

    .card:hover .card .header .title {
        padding: 0;
    }

    .card .content {
        display: block;
        text-align: justify;
        color: #212121;
        margin: 0 18px;
    }

    .card .content p {
        transition: all .5s;
        font-size: 1em;
        margin-bottom: 8px;
    }

    .card .content a {
        color: #1d8122;
        cursor: pointer;
        transition: all .5s;
        font-size: .8rem;
        font-weight: 500;
        text-transform: uppercase;
    }

    .card .content .btn-link:hover {
        border-bottom: 1px solid #1d8122;
    }


    .container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card_box {
        width: 600px;
        height: 550px;
        border-radius: 20px;
        background: linear-gradient(170deg, rgba(58, 56, 56, 0.623) 0%, rgb(31, 31, 31) 100%);
        position: relative;
        box-shadow: 0 25px 50px rgba(0,0,0,0.55);
        cursor: pointer;
        transition: all .3s;

    }

    .card_box:hover {
        transform: scale(0.9);
    }
h1{
    text-align: center;
    color: #FFFFFF;
}
</style>
<body>
<div class="container">
    <div class="card_box">
        <h1>理工学籍管理系统</h1>
        <div class="card">
            <div class="header">
                <div class="img-box">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path fill="rgba(66,193,110,1)" d="M20.083 15.2l1.202.721a.5.5 0 0 1 0 .858l-8.77 5.262a1 1 0 0 1-1.03 0l-8.77-5.262a.5.5 0 0 1 0-.858l1.202-.721L12 20.05l8.083-4.85zm0-4.7l1.202.721a.5.5 0 0 1 0 .858L12 17.65l-9.285-5.571a.5.5 0 0 1 0-.858l1.202-.721L12 15.35l8.083-4.85zm-7.569-9.191l8.771 5.262a.5.5 0 0 1 0 .858L12 13 2.715 7.429a.5.5 0 0 1 0-.858l8.77-5.262a1 1 0 0 1 1.03 0zM12 3.332L5.887 7 12 10.668 18.113 7 12 3.332z"></path>
                    </svg>
                </div>
                <h1 class="title">请选择角色</h1>
            </div>

            <div class="content">
                <p><a href="login.php">系统管理员</a></p>
                <p><a href="jslogin.php">教师</a></p>
                <p><a href="stulogin.php">学生</a></p>
            </div>
        </div>
    </div>
</div>


</body>
</html>