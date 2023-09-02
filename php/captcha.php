<?php
session_start();
header('content-type:image/PNG');
//1.创建黑色画布
$img = imagecreate(100, 30);
//2.为画布定义(背景)颜色
$back = imagecolorallocate($img, 255, 255, 255);
imagefill($img,0,0,$back);
$code="";
for ($i = 0; $i < 4; $i++) {
    $fontsize = 15;
    // 字体颜色
    $fontcolor = imagecolorallocate($img, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
    $authnum = rand(0, 9);
    $code .=$authnum;
    imagestring($img, $fontsize, 30+$i*10,10,$authnum,$fontcolor);
}
$_SESSION['captcha']=$code;
for ($i = 0; $i < 4; $i++) {
    $randcolor = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($img,rand()%150,rand()%150,$randcolor);
}
imagepng($img);
imagedestroy($img);
?>
