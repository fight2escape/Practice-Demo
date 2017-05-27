<?php 
/**
 * 生成压缩图片
 * 主要用到的GD库函数是
 * imagecreatetruecolor和imagecopyresampled
 */
//1、打开图片
$src = "./img/01.jpg";
$info = getimagesize($src);
$type = image_type_to_extension($info[2],false);
$create = "imagecreatefrom".$type;
$image = $create($src);
//2、操作图片
	//1、生成一张真色彩底片
	//imagecreatetruecolor(width, height)
	$img_thumb = imagecreatetruecolor($info[0]/2,$info[1]/2);
	//2、将图片重采样重新设置大小复制到底片上
	//imagecopyresampled(dst_image, src_image, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
	imagecopyresampled($img_thumb, $image, 0, 0, 0, 0, $info[0]/2, $info[1]/2, $info[0], $info[1]);
//3、输出图片
header("Content-Type:".$info['mime']);
$show = "image".$type;
$show($img_thumb);
//$show($image);
//4、销毁图片
imagedestroy($image);
imagedestroy($img_thumb);

?>