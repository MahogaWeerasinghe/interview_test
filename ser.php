<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:Content-Type, Authorization, X-Requested-With');
header('Content-Type:application/json;charset-utf-8');

include 'connection.php';

$postjson = json_decode(file_get_contents('php://input'),true);
echo $postjson;

if($postjson['aksi']=='register'){
    $password = md5($postjson['password']);
    $sql1 = "insert into login(user_name,password) values '$postjson['user_name']','$password'";

    $query = mysqli_query($conn,$sql1)

    if($query){
        $result = json_encode(array('success'==>true);
    }

    else{
        $result = json_encode(array('success'=>false,'msg'=>'error,please try'));
    }

    echo $result;
}



?>