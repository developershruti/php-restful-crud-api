<?php


header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);

$username = $data['uname'];
$email = $data['uemail'];
$password = $data['upassword'];

include "config.php";

$sql = "INSERT INTO users(username, email, password) VALUES ('{$username}', '{$email}', '{$password}')";


if(mysqli_query($conn, $sql) ){
    echo json_encode(array('message'=> 'Record Inserted.', 'status'=> true));
    
}else{
    echo json_encode(array('message'=> 'not Inserted.', 'status'=> false));
}

?>
