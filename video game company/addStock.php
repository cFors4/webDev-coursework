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

if (isset($_POST['addStock'])){
    $id = mysqli_real_escape_string($connection,$_POST['ID']);
    $stock = mysqli_real_escape_string($connection,$_POST['stock']);
    $quantity= mysqli_real_escape_string($connection,$_POST['quantity']);




    $sql = "INSERT INTO stock (stock, quantity) VALUES (?, ?);";

    //prepare statement
    $stmt = mysqli_stmt_init($connection);
    //prepare prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('Error in statement records');
         header("Location:index.php");
    }else{
        mysqli_stmt_bind_param($stmt, "si", $stock, $quantity);

        mysqli_stmt_execute($stmt);
      
        header("Location:index.php");
    }
    header("Location:index.php");
}
?>