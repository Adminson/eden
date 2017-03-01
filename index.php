
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


            <div class="row">
                <div class="col-md-12">   
                    <!-- call for contact -->
                    <div class="headline text-left">

                        <h2 class="section-title">Product</h2>
												                    <!--////////////////////////add service/////////////////////-->
                  <?php if($staffcheck == 0) {?>
                                        <button data-toggle="collapse" data-target="#demoservice"  class="btn btn-info">Add Product</button>
										 <?php } else { ?>
										 <button data-toggle="collapse" data-target="#demoservice"  class="btn btn-info" disabled="disabled">Add Product</button>
										 <?php } ?>
                    <br/>
                    <br/>
                    <div id="demoservice" class="collapse" style="background: #D9EDF7 ; padding: 20px;">
                        <form role="form" action="addproductdb.php" method="post" enctype="multipart/form-data">
						                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Brand:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="brand">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Small Info:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="smalldecs" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Description:</label>
                            <div class="col-sm-10"> 
								<textarea class="form-control" rows="5" id="comment" name="decs"></textarea>
                            </div>
                        </div>                        
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Model:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="model" >
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Price:</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" name="price" >
                            </div>
                        </div>
							<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Picture:</label>
                            <div class="col-sm-10"> 
                                <input name="upload" type="file"/><br/>
                            </div>
                        </div>							
						<div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Enable / Disable</label>
							<div class="col-sm-10"> 
							  <select class="form-control" name="onoff">
								<option value="0">Disable</option>
								<option value="1">Enable</option>
							  </select>
                        </div>
                        </div>

                            <input name="addservice" type="submit" id="addservice" value="Submit">
                        </form>
                    </div><br/>
					                    <!--////////////////////////end add service/////////////////////-->
                        <!-- /section-sub-title -->

                    </div> <!-- /.contact-speech -->
					
                    <table class="table table-hover" id="bootstrap-table">

                        <thead>
                            <tr class="info">
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Smalldecs</th>
                                <th>Decs</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM product ORDER BY p_id DESC";
                            $result = mysql_query($query);

                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['smalldecs']; ?></td>
                                    <td style="width:400px"><?php echo $row['decs']; ?></td>
									<td><?php echo $row['model']; ?></td>
									<td><?php echo $row['price']; ?></td>
									 <td><img src="../<?php echo $row['image']; ?>" class="img-rounded" alt="Cinque Terre" width="120" height="120"></td>
                                    

                                    <?php
                                    $enable = $row['enable'];
                                    if ($enable == '0') {
                                        ?>
                                        <td><a href="enable.php?id=<?php echo $row['p_id']; ?>" class="btn btn-info" role="button">Enable</a>
                                        <?php } else { ?>
                                        <td><a href="enable.php?ids=<?php echo $row['p_id']; ?>" class="btn btn-warning" role="button">Disable</a>
                                        <?php } ?>
											
											<?php if($staffcheck == 0) {?>
                                        <a href="orderedit.php?id=<?php echo $row['p_id']; ?>" class="btn btn-info" role="button">Edit</a>
										 <?php } else { ?>
										 <a href="orderedit.php?id=<?php echo $row['p_id']; ?>"  class="btn btn-danger disabled" role="button" >Edit</a>
										 <?php } ?>
										 <a href="productdelete.php?id=<?php echo $row['p_id']; ?>" class="btn btn-danger" role="button">Delete</a></td>  
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


            </div>



        </div>

        <script>
            initSample();
        </script>

        <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/vendor/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>
        <script src="js/jquery.bdt.js" type="text/javascript"></script>
        <script>
                    $(document).ready(function () {
                        $('#bootstrap-table').bdt();
                    });
        </script>
    </body>
</html>
