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
    $sql = "UPDATE product SET enable='1' WHERE p_id= '" . $id . "' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: index.php');
	
	
} else 	if (isset($_GET['ids'])) {/////////////////////////////////to disable company job list///////////////////////////


    echo $id = $_GET['ids'];
    $sql = "UPDATE product SET enable='0' WHERE p_id= '" . $id . "' ";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
   header('Location: index.php');
	
	
} 

?>