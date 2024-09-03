<?php
/* 1. firstly you have to include header for allow 
   access according to ypur facility all header are 
   but the Content-Type, Access-Control-Allow, and method
   control are main. basically method wala hume post
   POST main use karna rehta hai.

   2. $result is used to make connection with table.

   3. $output is used to fetch all data from $result 
      by mysqli_fetch_all.

*/



header('content-type:application/json');
header('action-control-allow-origin:*');

include "connection.php";

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("sql query failed.");
if( mysqli_num_rows($result)>0){
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($output);

}
else{
    echo json_encode(array('message'=>'no record found', 'status'=> false));
}

?>
