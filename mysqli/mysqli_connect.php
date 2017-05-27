<?php
 //1、建立连接
//$mysqli = new mysqli('localhost','root','');
//var_dump($mysqli);
//$mysqli->select_db('library');

//$mysqli = new mysqli('localhost','root','','library');
//var_dump($mysqli);

$mysqli = new mysqli();
$mysqli->connect('localhost','root','','library');
//var_dump($mysqli);
//通过$mysqli->connect_errno得到产生的错误编号
//通过$mysqli->connect_error得到产生的错误信息
if($mysqli->connect_errno){
    echo "Connect Error:".$mysqli->connect_error;
}
print_r($mysqli);
echo "<hr color='red'>";
echo "客户端版本号：".$mysqli->client_info."--------<br />";
echo mysqli_get_client_info($mysqli);
echo "<hr color='red'>";
echo "服务器版本:".$mysqli->server_info."<br />";
echo mysqli_get_server_info($mysqli);












