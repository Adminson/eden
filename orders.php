
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
        <title>Order Details</title>
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
  <?php
						$queryw = "SELECT * FROM customer,cart,product WHERE cart.productid = product.p_id AND customer.id = cart.customerid AND 
						cart.completed = '0' ORDER BY cart.id DESC";
                            $resultw = mysql_query($queryw);
							$kcount = 0;
                            while ($row = mysql_fetch_array($resultw)) {
								$kcount = $kcount + 1;
							}
                                ?>
            <a href="index.php" class="btn btn-info" role="button">Product</a>
            <a href="orders.php" class="btn btn-warning" role="button">Orders <!--<span class="badge"><?php echo $kcount; ?>--></span></a>
             <a href="logout.php" class="btn btn-info" role="button">Logout</a>


            <div class="row">
                <div class="col-md-12">   
                    <!-- call for contact -->
                    <div class="headline text-left">

                        <h2 class="section-title">Orders</h2>
                        
                    </div> <!-- /.contact-speech -->
					
                    <table class="table table-hover" id="bootstrap-table">

                        <thead>
                            <tr class="info">
                                <th>Customer Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						$query = "SELECT * FROM customer,cart,product WHERE cart.productid = product.p_id AND customer.id = cart.customerid ORDER BY cart.id DESC";
                            $result = mysql_query($query);

                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['uname']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
									<td><?php echo $row['model']; ?></td>
									<td><?php echo $row['quantity']; ?></td>
									<td><?php echo $row['price']; ?></td>
									 <td><img src="../<?php echo $row['image']; ?>" class="img-rounded" alt="Cinque Terre" width="120" height="120"></td>
                                    

                                    <?php
                                    $enable = $row['completed'];
                                    if ($enable == '1') {
                                        ?>
                                        <td><a href="enableorder.php?id=<?php echo $row['id']; ?>" class="btn btn-info" role="button">Closed</a>
                                        <?php } else { ?>
                                        <td><a href="enableorder.php?ids=<?php echo $row['id']; ?>" class="btn btn-warning" role="button">Close order</a>
                                        <?php } ?>
											
											<?php if($staffcheck == 0) {?>
                                        <a href="examples/report.php?id=<?php echo $row['customerid']; ?>" class="btn btn-info" role="button"  target="_blank">Print</a></td>
										 <?php } else { ?>
										 <a href="examples/report.php?id=<?php echo $row['customerid']; ?>"  class="btn btn-info disabled" role="button"  target="_blank">Print</a></td>  
										 <?php } ?>
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
