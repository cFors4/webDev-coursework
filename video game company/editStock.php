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

if (isset($_POST['editStock'])){
    $id = $_POST['ID'];
    $stock = $_POST['stock'];
    $quantity= $_POST['quantity'];

    echo($id);
    $sql = "UPDATE stock SET stock='$stock', quantity='$quantity'  WHERE id='$id';";

    if(!mysqli_query($connection,$sql)){
        die('Error in editing recordss');
        header("Location:index.php");
    }
    else{
        header("Location:index.php");
    }
    header("Location:index.php");
}
header("Location:index.php");

?>