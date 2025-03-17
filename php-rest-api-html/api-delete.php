<?php

header('content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);
$id = $data['uid'];


include "config.php";

$sql = "DELETE  FROM users WHERE id = {$id}";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message'=> 'Delete successfully.', 'status'=> true));

    
}else{
    echo json_encode(array('message'=> 'not deleted.', 'status'=> false));
}

?>
