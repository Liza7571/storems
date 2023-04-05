<?php
	
	session_start();
	
	require('connection.php');
	
	require('myfunction.php');
	
	$user_first_name  = $_SESSION['user_first_name'];
	$user_last_name   = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name)){
	
?>

<!DOCTYPE html>

<html>
	<head>
		<title> Edit Store Product</title>
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
								if(isset($_GET['id'])){
									$getid = $_GET['id'];
									
									$sql = "SELECT * FROM store_product WHERE store_product_id  = $getid";
									
									$query = $conn->query($sql);
									
									$data = mysqli_fetch_assoc($query);
									$store_product_id  			 = $data['store_product_id'];
									$store_product_name 		 = $data['store_product_name'];
									$store_product_quentity	 	 = $data['store_product_quentity'];
									$store_product_entry_date 	 = $data['store_product_entry_date'];
									
								}
								if(isset($_GET['store_product_name'])){
									$new_store_product_name		 = $_GET['store_product_name'];
									$new_store_product_quentity 	 = $_GET['store_product_quentity'];
									$new_store_product_entry_date		 = $_GET['store_product_entry_date'];
									$new_store_product_id 		 = $_GET['store_product_id'];
									
									$sql1 = "UPDATE store_product SET store_product_name = '$new_store_product_name',
													store_product_quentity		 = '$new_store_product_quentity',
													store_product_entry_date 	 = '$new_store_product_entry_date'
													WHERE store_product_id  	 = $new_store_product_id";
													
									if($conn->query($sql1) == TRUE){
											echo 'Update Successfull';
											header('location:list_of_store_product.php');					
										}else{
											echo "Error updating record:".$conn->error;
										}
								}
							?>
						
							
							
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
								Product :<br>
								<select name="store_product_name">
								<?php
										$sql = "SELECT * FROM product";
										$query = $conn->query($sql);
							
										while($data = mysqli_fetch_array($query)){
											$data_id 	=  $data['product_id'];
											 $data_name =  $data['product_name'];
									?>		 
										<option value='<?php echo $data_id ?>'<?php if($store_product_name == $data_id){echo 'Selected';} ?>>
										<?php echo $data_name ?>
										</option>";
									<?php }	?>
									
								</select><br><br>
								Product Quentity:<br>
								<input type="number" name="store_product_quentity" value="<?php echo $store_product_quentity ?>"><br><br>
								Storet Product Entry Date:<br>
								<input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date ?>"><br><br>
								<input type="text" name="store_product_id" value="<?php echo $store_product_id ?>"hidden>
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