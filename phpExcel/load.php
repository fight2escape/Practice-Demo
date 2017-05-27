<?php
    //Excel文件导出
    //
    //这次要包含的文件不一样，别搞混了
    $dir = dirname(__FILE__);
    require_once $dir."/Classes/PHPExcel/IOFactory.php";
    //设置要导出的文件路径
    $file = $dir."/test.xlsx";
    //全部加载要导出的文件
    $objPHPExcel = PHPExcel_IOFactory::load($file);
    //获取要导出的文件的表单数量
    $sheetCount = $objPHPExcel->getSheetCount();
    //循环输出各个表单里的值
    for($i=0;$i<$sheetCount;$i++){
        //依次获取各个表单对象，然后将表单转成数组
        $data = $objPHPExcel->getSheet(0)->toArray();
        var_dump($data);
    }

    //全部加载的话占用的系统资源太多，可以用如下方法部分导出（貌似有点问题)
    /* 
    //首先，自动识别文件的格式，看是03版、07版还是更新的版本
    $readerType = PHPExcel_IOFactory::identify($file);
    //创建一个读取相应文件类型的对象
    $objReader = PHPExcel_IOFactory::createReader($readerType);
    //设置要加载的表单名
    $sheetName = "sheet1";
    //设置只加载相应的表单
    $objReader->setLoadSheetsOnly($sheetName);
    //进行加载
    $objPHPExcel = $objReader->load($file);
    */

    //将加载了的表单内容以单元格为单位依次迭代输出
    /*
    //先获取表单对象
    foreach($objPHPExcel->getWorkSheetIterator() as $sheet){
        //再获取每行对象
        foreach($sheet->getRowIterator() as $row){
            //再获取每个单元格对象
            foreach($row->getCellIterator() as $cell){
                //执行获取值的函数，再赋值给数组保存
                $data[] = $cell->getValue();

            }

            //echo "<br /><br/>";
        }
        //打印本表单的值
        print_r($data);
        echo "<br />";
    }
    */
    exit;
?>