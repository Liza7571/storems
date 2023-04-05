<?php
session_start();
	require('connection.php');
	//require('myfunction.php');
	$user_first_name  = $_SESSION['user_first_name'];
	$user_last_name   = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name)){
	
	
	
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Spent Product</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	<body>
		<div class="container bg-light">
			<div class="container-foulid border-bottom border-success"><!--topbar-->
				<?php include('topbar.php') ?>
			</div><!--@end topbar-->
			<div class="container-foulid">
				<div class="row">
					<div class="col-sm-3 bg-light p-0 m-0"><!--Left bar-->
						<?php include('leftbar.php') ?>
					</div><!--@end of Left-->
					<div class="col-sm-9 border-start border-success"><!--right bar-->
						<div class="container p-4 m-4">
							<?php
								if(isset($_GET['spend_product_name'])){
									$spend_product_name 		 = $_GET['spend_product_name'];
									$spend_product_quentity		 = $_GET['spend_product_quentity'];
									$spend_product_entry_date 	 = $_GET['spend_product_entry_date'];
													
									$sql =  "INSERT INTO  spend_product(spend_product_name, spend_product_quentity, spend_product_entry_date) 
											VALUES('$spend_product_name', '$spend_product_quentity','$spend_product_entry_date')";
									
									if($conn->query($sql) == TRUE){
										echo 'Data Inserted';
									}else{
										echo 'Data not Inserted';
									}
									
								}
							?>
						
							<?php
								$sql = "SELECT * FROM product";
								$query = $conn->query($sql);
							?>
							
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
								Product :<br>
								<select name="spend_product_name">
								<?php
										while($data = mysqli_fetch_array($query)){
										 $product_id 	=  $data['product_id'];
										 $product_name =  $data['product_name'];
										 
										echo "<option value='$product_id'>$product_name</option>";
									}
										//data_list('product','product_id','product_name');
								?>
									
								</select><br><br>
								Product Quentity:<br>
								<input type="text" name="spend_product_quentity"><br><br>
								Storet Product Entry Date:<br>
								<input type="date" name="spend_product_entry_date"><br><br>
								<input type="submit" value="submit" class="btn btn-success">
							</form>
						</div><!--@end of container-->
					</div><!--@end of Right-->
				</div><!--@end of row-->	
			</div>
			<div class="container-foulid border-top border-success">
				<?php include('bottombar.php') ?>
			</div>
		</div><!--@end of container-->
	</body>
</html>
	
	<?php
		
		}else{
			header('location:login.php');
		}
	
	?>