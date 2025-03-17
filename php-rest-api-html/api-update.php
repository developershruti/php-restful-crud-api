<?php


header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);

$id = $data['uid'];
$username = $data['uname'];
$email = $data['uemail'];
$password = $data['upassword'];

include "config.php";

$sql = "UPDATE users SET username = '{$username}', email= '{$email}', password = '{$password}' WHERE id = {$id}";


if(mysqli_query($conn, $sql) ){
    echo json_encode(array('message'=> 'Record Updated sucessfully.', 'status'=> true));
    
}else{
    echo json_encode(array('message'=> 'not updated.', 'status'=> false));
}

?>
