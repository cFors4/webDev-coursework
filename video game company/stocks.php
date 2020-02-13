<?php
$conn = mysqli_connect("localhost", "root", "", "stockdb");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  //get data
  $sql = "SELECT id, stock, quantity FROM stock";
  $result = $conn->query($sql);

//storing in array
$data = array();


   // output data of each row
while($row = $result->fetch_assoc()) {
  	$data[] = $row;
 }
  
//return response in JSON format
  echo (json_encode($data));
?>