<?php

/* 1. $data wali line is used to fetch data in json formet
       by an array in below line pass column values into
       it.
*/

header('content-type:application/json');
header('access-control-allow-origin:*');
header('access-control-allow-method: POST');
header('access-control-allow-headers: access-control-allow-headers, content-type, access-control-allow-method, authorization, x-requested-with');

$data = json_decode(file_get_contents("php://input"), true);



// Extract data
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

// Include the connection file
include "connection.php";

// Insert data into the database
$sql = "INSERT INTO students (name, age, city) VALUES ('$name', $age, '$city')";

if(mysqli_query($conn, $sql)){
 
    echo json_encode(array('message'=>'inserted sucessfully', 'status'=> true));
}
else{
    echo json_encode(array('message'=>'Not inserted sucessfully', 'status'=> false));

}

?>