<?php

header('content-type: application/json');
header('Access-control-Allow-origin: *'); // easily access krva mate phn n web ma

include "config.php";
 
$sql = "SELECT * FROM stud_detail";
$result = mysqli_query($conn, $sql) or die("SQL Query failed..");

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC); // convert result data in json 
    echo json_encode($output);
}else{
    echo json_encode(array('message'=>'No record found', 'status'=> false)); // array bnavyo n 2 key lidhi msg n status n ene value api
}

?>