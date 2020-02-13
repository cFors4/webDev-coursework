<?php


$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "stockdb";

// Create connection
$connection = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
if (!$connection)
{
die ('Could not connect:' . mysqli_connect_error());
}

if (isset($_POST['deleteStock'])){
    $id = $_POST['ID'];
    $stock = $_POST['stock'];
    $quantity= $_POST['quantity'];


    $sql = "DELETE FROM stock WHERE id = '$id';";

    if(!mysqli_query($connection,$sql)){
        die('Error in deleting records');
        header("Location:index.php");
    }
    else{
        header("Location:index.php");
    }
    header("Location:index.php");
}
header("Location:index.php");

?>