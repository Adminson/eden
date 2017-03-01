<?php
session_start();
if(isset( $_SESSION['username'])=="admin")
{
   $message = 'Users is already logged in';
}else{
	 header('Location: adminlogin.php');
}

include("database.php");
	
	
	if (isset($_GET['id'])) {/////////////////////////////////to enable company job list///////////////////////////


    echo $id = $_GET['id'];
    $sql = "UPDATE cart SET completed='0' WHERE id= '" . $id . "' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
   header('Location: orders.php');
	
	
} else 	if (isset($_GET['ids'])) {/////////////////////////////////to disable company job list///////////////////////////


    echo $id = $_GET['ids'];
    $sql = "UPDATE cart SET completed='1' WHERE id= '" . $id . "' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
 header('Location: orders.php');
	
	
} 

?>