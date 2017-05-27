<?php 
/**
 * 给图片添加文字水印
 */

//1、打开图片
  $fileSrc = "./img/01.jpg";
  $fileInfo = getimagesize($fileSrc);
  /*var_dump($fileInfo);exit;
  array(
	  0 => int 680
	  1 => int 454
	  2 => int 2
	  3 => string 'width="680" height="454"' (length=24)
	  'bits' => int 8
	  'channels' => int 3
	  'mime' => string 'image/jpeg' (length=10)
	);*/
  $fileType = image_type_to_extension($fileInfo['2'],false);
  //echo $fileType;exit;
  $create = "imagecreatefrom".$fileType;
  $image = $create($fileSrc);

//2、操作图片
  $fontSize = 20;
  $angle = 0;
  $x = 20;
  $y = 30;
  $color = imagecolorallocatealpha($image, 255, 0, 0,30);
  $fontfile = "./font/STCAIYUN.TTF";
  $text = "Hello Imooc!你好慕课";
  imagettftext($image, $fontSize, $angle, $x, $y, $color, $fontfile, $text);

//3、显示、保存
  header("Content-Type:".$fileInfo['mime'].";charset=utf-8");
  $show = "image".$fileType;
  $show($image);
  $show($image,"./img/01_new.".$fileType);

//4、销毁图片
  imagedestroy($image);
?>


