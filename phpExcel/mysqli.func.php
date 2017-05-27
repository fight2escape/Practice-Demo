<?php
////////////
//数据库相应操作 //
////////////
///
//首先连库
function connect(){
    $connect = mysqli_connect("localhost","root","",'library');
    mysqli_set_charset($connect,'utf8');
    return $connect;
}

//防止数据重复冗余，先检查下是否存在
function checkExists($table,$col,$val){
    $sql = "SELECT * FROM $table WHERE $col='{$val}'";
    if(mysqli_fetch_all(mysqli_query(connect(),$sql))){
        return true;
    }else{
        return false;
    }
    //echo $sql;
}

//执行插入作者信息
function insertAuthor($arr){
    $sql = "INSERT author(name,email) VALUES('$arr','')";
    //echo $sql;exit;
    if(mysqli_query(connect(),$sql)){
        echo "数据插入成功";
    }else{
        echo "数据插入失败";
    }
}

//插入图书信息
function insertBooks($arr){
    $bookname = $arr[1];
    $author_id = getAuthorIdByName($arr[3]);
    $pubTime = time();
    $owner = $arr[2];
    //var_dump($author_id);
    //exit;
    $sql = "INSERT books(bookname,author_id,press_id,pubTime,quantity,quantity_left,owner,reader) VALUES('{$bookname}','{$author_id}','1','{$pubTime}','1','1','{$owner}','')";

    if(mysqli_query(connect(),$sql)){
        echo "书本添加成功";
    }else{
        echo "书本添加失败";
    }
}

//通过书名获取作者名称
function getAuthorIdByName($name){
    $sql = "SELECT id FROM author WHERE name='{$name}'";
    //mysqli_fetch_all获取到的是一个对象，而不是一个具体的值
    if($id = mysqli_fetch_all(mysqli_query(connect(),$sql))){
        return $id[0][0];
    }else{
        return 1;
    }
}

//插入学生信息
function insertStudent($num,$name){
    $sql = "INSERT student(stu_index,name,age,academy) VALUES('{$num}','{$name}','20','计算机学院')";
    if(mysqli_query(connect(),$sql)){
        echo "添加学生成功".$num.":".$name."<br/>";
    }else{
        echo "添加学生失败".$num.":".$name."<br />";
    }
}

//插入作者信息
function insertUser($num){
    if(!checkExists('users','name',$num)){
        $psw = md5($num);
        $email = $num."@cumt.edu.cn";
        $sql = "INSERT users(name,password,email,phone) VALUES('{$num}','{$psw}','{$email}','')";
        if(mysqli_query(connect(),$sql)){
            echo "添加用户成功".$num."<br />";
        }else{
            echo "添加用户失败".$num."<br />";
        }
    }else{
        echo "用户:".$num.".已经存在";
    }
}