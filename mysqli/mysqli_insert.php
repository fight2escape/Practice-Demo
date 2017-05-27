<?php
header("Content-Type:text/html;charset=utf-8");
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    echo "Connect Error:".$mysqli->connect_error."<br/>";
}
$sql = <<<EOF
    CREATE TABLE IF NOT EXISTS admin(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    psw VARCHAR(20) NOT NULL
    );

EOF;
//$sql .= "insert admin(name) values('你好')";
//$sql = "drop table admin";
$sql2 = "INSERT admin(name,psw) VALUES('bin2','bin'),('bin3','bin'),('bin4','bin')";
$res = $mysqli->query($sql2);
if($res){
    echo "恭喜你，成为网站的第".$mysqli->insert_id."位用户.<br />";
    echo "有".$mysqli->affected_rows."条记录被影响<br />";
}else{
    echo "Error ".$mysqli->errno.":".$mysqli->error;
}

$sql = "update admin set psw='bin'";
$res = $mysqli->query($sql);
if($res){
    echo "共有".$mysqli->affected_rows."条记录被更新<br />";
}else{
    echo "Error ".$mysqli->errno.":".$mysqli->error;
}

$sql = "delete from admin where id>5";
$res = $mysqli->query($sql);
if($res){
    echo $mysqli->affected_rows."条记录被影响";
}else{
    echo "Error ".$mysqli->errno.":".$mysqli->error;
}











