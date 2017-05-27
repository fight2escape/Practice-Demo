<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->errno){
    die('Connect Error:'.$mysqli->error);
}
$mysqli->set_charset('UTF8');
//预处理准备
$sql = "INSERT admin(name,psw) VALUES(?,?);";
$mysqli_stmt = $mysqli->prepare($sql);
//绑定参数
$name = "bin7";
$psw = "bin7";
$mysqli_stmt->bind_param('ss',$name,$psw);
//执行预处理
if($mysqli_stmt->execute()){
    echo "INSERT_ID:".$mysqli_stmt->insert_id;
    echo "<br />";
}else{
    echo $mysqli_stmt->error;
}
//释放结果集
$mysqli_stmt->free_result();
//关闭预处理
$mysqli_stmt->close();
$mysqli->close();




