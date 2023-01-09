<?php
include "config.php";

// SEARCH DATA USING POST METHOD to search data in POSTMAN Application --->

header('content-type: application/json');
header('Access-control-Allow-origin: *'); // easily access krva mate phn n web ma

$data = json_decode(file_get_contents("php://input"), true); // json decode array ma convert krva mate

$searchValue = $data['search'];

$sql = "SELECT * FROM stud_detail WHERE firstname LIKE '%$searchValue%' OR lastname LIKE '%$searchValue%' OR
age LIKE '%$searchValue%' OR city LIKE '%$searchValue%'";

$result = mysqli_query($conn, $sql) or die("SQL Query failed..");

if(mysqli_num_rows($result)>0)
{
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC); // convert result data in json 
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No search record found', 'status'=> false)); // array bnavyo n 2 key lidhi msg n status n ene value api
}

?>

