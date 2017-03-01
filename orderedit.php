
<?php
session_start();

$staffcheck = 0;
if(isset( $_SESSION['username'])=="admin")
{
	$sess = $_SESSION['username'];
	if($sess=="admin"){
	
	}else{
		$staffcheck = 1;
	}
	
}else{
	 header('Location: adminlogin.php');
}
include("database.php");

?>
<html lang="en">
    <head>
        <title>Product Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="ckeditor.js"></script>
        <script src="samples/js/sample.js"></script>
        <link rel="stylesheet" href="samples/css/samples.css">
    </head>
    <body>
        <div class="container">
			  <div class="page-header">
    <h1>Website </h1>      
  </div>
            <a href="index.php" class="btn btn-warning" role="button">Product</a>
            <a href="orders.php" class="btn btn-info" role="button">Orders</a>
             <a href="logout.php" class="btn btn-info" role="button">Logout</a>

 <br/>
 <br/>
            <div class="row">
                <div class="col-md-10">   

                    <form class="form-horizontal" role="form" action="orderdb.php" method="post" enctype="multipart/form-data">
					
					    <?php
						$id = $_GET['id'];
                        $query = " SELECT * FROM product where p_id='".$id."'";
                        $result = mysql_query($query);

                        while ($row = mysql_fetch_array($result)) {
                    ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" >
                                <input type="hidden" class="form-control" name="id" value="<?php echo $row['p_id']; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">brand:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="brand" value="<?php echo $row['brand']; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">smalldecs:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="smalldecs" value="<?php echo $row['smalldecs']; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">decs:</label>
                            <div class="col-sm-10"> 
								<textarea class="form-control" rows="5" id="comment" name="decs"><?php echo $row['decs']; ?></textarea>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">model:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="model" value="<?php echo $row['model']; ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">price:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                            </div>
                        </div>
												<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Enable / Disable</label>
							<div class="col-sm-10"> 
							  <select class="form-control" name="onoff">
								<option value="1">Disable</option>
								<option value="0">Enable</option>
							  </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Picture:</label>
                            <div class="col-sm-10"> 
							<img src="../<?php echo $row['image']; ?>" style="width:304px;height:228px;">
								<br/><br/><input name="upload" type="file"/><br/>
                            </div>
                        </div>
						
						
						
						
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
						  <?php } ?>
                    </form>


                </div>
                </body>
                </html>