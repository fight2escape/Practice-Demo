<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    die("Connect_Error:".$mysqli->connect_error);
}
$mysqli->set_charset('UTF8');

$username = $_POST['username'];
$password = $_POST['password'];

/* $sql = "SELECT * FROM admin WHERE name='{$username}' AND psw='{$password}'";

if($mysqli->query($sql)){
    echo "登录成功";
}else{
    echo "登录失败";
} */


$sql = "SELECT * FROM admin WHERE name=? AND psw=?";
$mysqli_stmt = $mysqli->prepare($sql);

$mysqli_stmt->bind_param('ss',$username,$password);

if($mysqli_stmt->execute()){
    $mysqli_stmt->store_result();
    echo "Num_rows:".$mysqli_stmt->num_rows();
    echo "<br/>LOGIN SUCCEED";
}else{
    echo "LOGIN FAILED";
}

$mysqli_stmt->free_result();
$mysqli->close();












