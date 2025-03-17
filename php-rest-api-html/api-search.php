<?php

header('content-type: application/json');
header('Access-control-Allow-Origin: *');

// for post method
// $data = json_decode(file_get_contents("php://input"),true);
// $search_value = $data['search'];

// for get method
$search_value =isset($_GET['search']) ? $_GET['search'] : die();


include "config.php";

$sql = "SELECT * FROM users WHERE username  LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("sql query failed.");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
    
}else{
    echo json_encode(array('message'=> 'no search found.', 'status'=> false));
}

?>
