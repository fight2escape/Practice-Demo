<?php
//实际应用
//读取Excel文件内容导入数据库
//
//将要用到的文件一一包含
$dir = dirname(__FILE__);
require_once $dir."/Classes/PHPExcel/IOFactory.php";
require_once $dir."/mysqli.func.php";
$filename = $dir."/test.xlsx";
//数据量小，直接暴力全部加载
$objPHPExcel = PHPExcel_IOFactory::load($filename);
$sheetCount = $objPHPExcel->getSheetCount();
$data = $objPHPExcel->getSheet(0)->toArray();
//var_dump($data);
//循环获取各行数据，逐行导入数据库
foreach($data as $row){
    //var_dump($row);
    if(!is_numeric($row[0])||$row[3]==""){
        continue;
    }else{
        if(checkExists('author','name',$row[3])){
            echo "author has been exists<br />";
        }else{
            insertAuthor($row[3]);
            echo "<br/>".$row[3]."<br/>";
        }
       // var_dump(checkExists('author','name',$row[3]));
        if(checkExists('books','bookname',$row[1])){
            echo "book has been exists<br/>";
        }else{
            insertBooks($row);
            echo $row[1]."<br />";
        }
    }
}


exit;