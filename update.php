<?php



header('content-type:application/json');
header('access-control-allow-origin:*');
header('access-control-allow-method: PUT');
header('access-control-allow-headers: access-control-allow-headers, content-type, access-control-allow-method, authorization, x-requested-with');

$data = json_decode(file_get_contents("php://input"), true);



// Extract data
$id = $data['id'];
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

// Include the connection file
include "connection.php";

// Insert data into the database
$sql = "UPDATE students SET name='$name', age=$age, city='$city' WHERE id=$id ";


if(mysqli_query($conn, $sql)){
 
    echo json_encode(array('message'=>'Updated sucessfully', 'status'=> true));
}
else{
    echo json_encode(array('message'=>'Not updated sucessfully', 'status'=> false));

}

?>