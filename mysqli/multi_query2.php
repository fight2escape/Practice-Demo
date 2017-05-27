<?php 
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    die('Connect_error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');

$sql = "SELECT * FROM admin;";
$sql .= "SELECT name,psw FROM admin;";
$sql .= "SELECT CURRENT_USER();";
$sql .= "SELECT NOW();";
if($mysqli->multi_query($sql)){
    do{
        if($result = $mysqli->store_result()){
        $rows[] = $result->fetch_all(MYSQLI_ASSOC);
       
        }
    }while($mysqli->more_results() && $mysqli->next_result());
}
 var_dump($rows);
 $mysqli->close();



