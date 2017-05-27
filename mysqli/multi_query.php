<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error());
}

$mysqli->set_charset('utf8');

$sql = "INSERT admin(name,psw) VALUES('bin6','bin');";
$sql .= "UP DATE admin SET psw='binbin' WHERE id='8';";
$sql .= "SELECT * FROM admin";
//$mysqli->multi_query($sql);

$res = $mysqli->multi_query($sql);
var_dump($res);

$mysqli->close();






