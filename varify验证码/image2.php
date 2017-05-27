<?php 
require_once 'image2.class.php';

$src = "./img/01.jpg";
$src2 = "./img/02.jpg";
$image = new image($src);
/*
$image->textMark();
$image->show();
$image->save('01_txtMark');
*/
//$image->addTextMark('01_txtMark2');
//
//
/*
$image -> imgMark($src2);
$image -> show();
$image -> save('02_imgMark');
*/
//$image -> addImgMark($src2,'02_imgMark2');
//
//
//
/*$image -> thumb(0,200,100);
$image -> show(2);
$image -> save('02_thumb',2);
*/
$image -> imageThumb('02_thumb2',0.5);

?>