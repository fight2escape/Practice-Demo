<?php
//实际应用
//读取Excel文件内容导入数据库
//
$dir = dirname(__FILE__);
require_once $dir."/Classes/PHPExcel/IOFactory.php";
require_once $dir."/mysqli.func.php";
$filename = $dir."/student.xlsx";
$objPHPExcel = PHPExcel_IOFactory::load($filename);
$data = $objPHPExcel->getSheet(0)->toArray();
foreach($data as $row){
    //var_dump($row);
    //第二个判断之所以没有看到checkExists，是因为集成在insertUser里判断了
    if(is_numeric($row[0])&&!checkExists('student','name',$row[1])){
        insertStudent($row[0],$row[1]);
    }
    if(is_numeric($row[0])){
        insertUser($row[0]);
    }
}