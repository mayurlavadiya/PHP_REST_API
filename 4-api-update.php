<?php

include "config.php";

header('content-type: application/json');
header('Access-Control-Allow-origin: *'); // easily access krva mate phn n web ma
header('Access-Control-Allow-Methods: PUT'); // PUT for update
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization,X-Requested-with');

$data = json_decode(file_get_contents("php://input"), true); // json decode array ma convert krva mate
$student_id = $data['id'];
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$age = $data['age'];
$city = $data['city'];


$sql = "UPDATE stud_detail SET firstname = '$firstname', lastname = '$lastname', age = '$age',city = '$city' WHERE id = '$student_id'";

if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message'=>'Student record updated', 'status'=> true)); // array bnavyo n 2 key lidhi msg n status n ene value api
}
else{
    echo json_encode(array('message'=>'Student record not updated', 'status'=> false)); // array bnavyo n 2 key lidhi msg n status n ene value api
}

?>