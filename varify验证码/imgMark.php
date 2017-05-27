<?php 
/**
 * 给图片添加图片水印
 */
//与添加文字水印不同的是里面的一个函数imagecopymerge
//1、打开图片
	$fileSrc = "./img/01.jpg";
	$fileInfo = getimagesize($fileSrc);
	$fileType = image_type_to_extension($fileInfo[2],false);
	$create = "imagecreatefrom".$fileType;
	$image = $create($fileSrc);

//2、操作图片
	$waterSrc = "./img/02.jpg";
	$waterInfo = getimagesize($waterSrc);
	$waterType = image_type_to_extension($waterInfo[2],false);
	$createWater = "imagecreatefrom".$waterType;
	$water = $createWater($waterSrc);
	imagecopymerge($image, $water, 0, 0, 0, 0, $waterInfo[0]/2, $waterInfo[1]/2, 50);
	imagedestroy($water);
//3、显示、保存
	header("Content-Type:".$fileType['mime']);
	$showImg = "image".$fileType;
	$showImg($image);
	$showImg($image,"./img/01_imgMark.".$fileType);
//4、销毁图片
	imagedestroy($image);


?>
