<?php
include "config.php";

// SEARCH DATA USING GET METHOD

/*
    in POSTMAN Application for search data using GET method and here step i showing for performing task --->
    
        1. Select Get method
        2. Select URL : http://localhost:8080/task/Task_Running/PHP_REST_API/7-api-search-GET.php
        3. And Add search data in URL like ---> http://localhost:8080/task/Task_Running/PHP_REST_API/7-api-search-GET.php?search=cha
        4. Send --- Output generated...

*/

header('content-type: application/json');
header('Access-control-Allow-origin: *'); // easily access krva mate phn n web ma

// fetch data from URL using GET method
$searchValue = isset($_GET['search']) ? $_GET['search'] : die();

$sql = "SELECT * FROM stud_detail WHERE firstname LIKE '%$searchValue%' OR lastname LIKE '%$searchValue%'";

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
