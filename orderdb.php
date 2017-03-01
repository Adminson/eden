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
	
	
$id = $_POST["id"];
$name = $_POST["name"];
$brand = $_POST["brand"];
$smalldecs = $_POST["smalldecs"];
$decs = $_POST["decs"];
$model = $_POST["model"];
$price = $_POST["price"];
$onoff = $_POST["onoff"];
    //Get the temp file path
    $tmpFilePath = $_FILES['upload']['tmp_name'];

    //Make sure we have a filepath
    //Setup our new file path
   $image = $newFilePaths = "img/" . $_FILES['upload']['name'];
	$newFilePath = "../img/" . $_FILES['upload']['name'];

    //Upload the file into the temp dir
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

        //Handle other code here
    }
	
	     if ($image == "img/") {
            $sql = "UPDATE product SET name='$name',brand='$brand',smalldecs='$smalldecs',decs='$decs',model='$model',price='$price',enable='$onoff' WHERE p_id= '" . $id . "' ";
        } else {

            $sql = "UPDATE product SET name='$name',brand='$brand',smalldecs='$smalldecs',decs='$decs',model='$model',price='$price',enable='$onoff',image='$image' WHERE p_id= '" . $id . "' ";
        }


   

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
 header('Location: index.php');
	
	?>