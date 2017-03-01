<?php
//session_start();
//if(isset( $_SESSION['username'])=="admin")
//{
//    $message = 'Users is already logged in';
//}else{
//	 header('Location: adminlogin.php');
//}
    // Connect to MySQL
include("database.php");
	
	
$id = $_GET["id"];



// sql to delete a record
    $sql = "DELETE FROM product WHERE p_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	?>