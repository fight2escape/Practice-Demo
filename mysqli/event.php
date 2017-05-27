<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    die('Connect_error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//事务处理
//先关闭自动提交
$mysqli->autocommit(false);
//然后设置各值
$sql = "UPDATE acount SET money=money-1000 WHERE name='bin'";
$res = $mysqli->query($sql);
$res_aff = $mysqli->affected_rows;

$sql1 = "UPDATE acount SET money=money+1000 WHERE name='binbin'";
$res1 = $mysqli->query($sql1);
$res1_aff = $mysqli->affected_rows;

//判断是否同时正确，确认无误可以提交，然后打开自动提交
if($res && $res_aff && $res1 && $res1_aff){
    $mysqli->commit();
    echo "转账成功";
    $mysqli->autocommit(true);
    
}else{
    //不成功则回滚，撤销数据库操作
    $mysqli->rollback();
    echo "falied";
}

$mysqli->close();











