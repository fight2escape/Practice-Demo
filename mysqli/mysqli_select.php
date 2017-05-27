<?php
$mysqli = new mysqli('localhost','root','','test');
if($mysqli->connect_errno){
    echo "Connect Error:".$mysqli->connect_error;
}
$mysqli->set_charset('utf8');
$sql = "select * from admin";
$mysqli_result = $mysqli->query($sql);
//var_dump($mysqli_result);
if($mysqli_result && $mysqli_result->num_rows>0){
    echo "num_rows:".$mysqli_result->num_rows;
    //$rows = $mysqli_result->fetch_all();
    //$rows = $mysqli_result->fetch_all(MYSQLI_NUM);
    //$rows = $mysqli_result->fetch_all(MYSQLI_ASSOC);
    //$rows = $mysqli_result->fetch_all(MYSQLI_BOTH);
    //var_dump($rows);
    echo "<hr/>";
   /*  
    $row = $mysqli_result->fetch_row();
    var_dump($row);
    $row = $mysqli_result->fetch_row();
    var_dump($row); */
    /* $row = $mysqli_result->fetch_array();
    var_dump($row);
    echo "<hr/>";
    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);
    var_dump($row);
    echo '<hr/>';
    $row = $mysqli_result->fetch_object();
    var_dump($row);
    echo '<hr />';
    $row = $mysqli_result->fetch_assoc();
    var_dump($row);
    $mysqli_result->data_seek(0);
    $array = $mysqli_result->fetch_assoc();
    var_dump($array); */
    
    /* $mysqli_result->data_seek(0);
    while($row = $mysqli_result->fetch_assoc()){
        var_dump($row);
        echo '<hr />';
    }
    $mysqli_result->close(); */
}else{
    echo "hi";
}
$mysqli->close();












