<?php
//1、创建到MYSQL的连接
@$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    echo "Connect Error:".$mysqli->connect_error."<br/>";
}
//2、设置字符集
$mysqli->set_charset('utf-8');
//3、执行SQL查询
$sql = <<<EOF
    CREATE TABLE IF NOT EXISTS admin(
    id TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
    );
EOF;

$result = $mysqli->query($sql);
var_dump($result);

//4、关闭连接
$mysqli->close();







