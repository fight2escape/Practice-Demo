<?php
	//直接导入数组
	//
	//同上
	$dir = dirname(__FILE__);
	require_once $dir."/Classes/PHPExcel.php";
	$objPHPExcel1 = new PHPExcel();
	$objSheet1 = $objPHPExcel1->getActiveSheet();
	$objSheet1->setTitle('demo1');
	//导入的值可为二维数组，第一个空数组可使第一行为空，第一个数据为空可使第一列为空
	$arr = array(
		array(),
		array('','this','is','me'),
		array('','and','you','sb.')
	);
	//设置要导入的数组
	$objSheet1->fromArray($arr);
	//设置格式，保存文件
	$objWrite1 = PHPExcel_IOFactory::createWriter($objPHPExcel1,'Excel2007');
	$objWrite1->save($dir."/demo1.xlsx");
?>