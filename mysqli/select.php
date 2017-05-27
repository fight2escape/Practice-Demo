<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    die("Connect_error:".$mysqli->connect_error);
}
$mysqli->set_charset('UTF8');

$sql = "SELECT * FROM admin WHERE id>?";
$mysqli_stmt = $mysqli->prepare($sql);
$id = 10;
$mysqli_stmt->bind_param('i',$id);
if($mysqli_stmt->execute()){
    //绑定结果集变量
    $mysqli_stmt->bind_result($id,$name,$psw);
    //通过fetch（）依次获得结果集
    while($mysqli_stmt->fetch()){
        echo "id:".$id;
        echo "<br/>name:".$name;
        echo "<br/>password:".$psw;
        echo "<hr/>";
    }
}else{
    die("FAILED");
}
$mysqli_stmt->free_result();
$mysqli_stmt->close();
$mysqli->close();


