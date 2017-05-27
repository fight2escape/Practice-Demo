<?php
	//将数据导入excel中
	//
	//文件夹路径
	$dir = dirname(__FILE__);
	//包含插件文件
	require_once $dir."/Classes/PHPExcel.php";
	$objPHPExcel = new PHPExcel();
	//获取当前打开的表单对象
	$objSheet = $objPHPExcel->getActiveSheet();
	//设置当前表单的表名
	$objSheet->setTitle('demo');
	//一一设置单元格的值，这样子虽然麻烦点，但是效率高，占用资源少
	$objSheet->setCellValue('A1','是我')->setCellValue('B1','是你');
	$objSheet->setCellValue('A2','hello')->setCellValue('B2','world');
	//设置导出格式为2007的
	$objWrite = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
	//保存文件，同时设置文件名
	$objWrite->save($dir.'/demo.xlsx');
?>