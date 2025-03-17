<?php


header('content-type: application/json');
header('Access-control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"),true);
$user_id = $data['uid'];


include "config.php";

$sql = "SELECT * FROM users WHERE id = {$user_id}";
$result = mysqli_query($conn, $sql) or die("sql query failed.");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
    
}else{
    echo json_encode(array('message'=> 'no record found.', 'status'=> false));
}
?>
