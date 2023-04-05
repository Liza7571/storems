<?php
		
	session_start();
	
	require('connection.php');
	
	$user_first_name  = $_SESSION['user_first_name'];
	$user_last_name   = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Edit Product</title>
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
									
									$sql = "SELECT * FROM product WHERE product_id = $getid";
									
									$query = $conn->query($sql);
									
									$data = mysqli_fetch_assoc($query);
									$product_id 		 = $data['product_id'];
									$product_name 		 = $data['product_name'];
									$product_category	 = $data['product_category'];
									$product_code 		 = $data['product_code'];
									$product_entry_date  = $data['product_entry_date'];
								}
								
								if(isset($_GET['product_name'])){
									$new_product_name		 = $_GET['product_name'];
									$new_product_category 	 = $_GET['product_category'];
									$new_product_code		 = $_GET['product_code'];
									$new_product_entry_date  = $_GET['product_entry_date'];
									$new_product_id 		 = $_GET['product_id'];
									
									$sql1 = "UPDATE product SET product_name = '$new_product_name',
													product_category		 = '$new_product_category',
													product_code 			 = '$new_product_code',
													product_entry_date 		 = '$new_product_entry_date'
													WHERE product_id 		 = $new_product_id ";
													
									if($conn->query($sql1) == TRUE){
											echo 'Update Successfull';
											header('location:list_of_product.php');					
										}else{
											echo "Error updating record:".$conn->error;
										}
								}
							?>
						
							<?php
								$sql = "SELECT * FROM category";
								$query = $conn->query($sql);
							?>
							
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
								Product:<br>
								<input type="text" name="product_name" VALUE="<?php echo $product_name ?>"><br><br>
								Product Category:<br>
								<select name="product_category">
								<?php
									while($data = mysqli_fetch_array($query)){
										 $category_id 	=  $data['category_id'];
										 $category_name =  $data['category_name'];
									?>	 
										echo "<option value='<?php echo $category_id ?>'<?php if($category_id == $product_category){echo 'Selected';}?>>
										<?php echo $category_name ?>
										</option>";
										
									<?php } ?>
								?>
									
								</select><br><br>
								Product Code:<br>
								<input type="text" name="product_code" VALUE="<?php echo $product_code ?>"><br><br>
								Product Entry Date:<br>
								<input type="date" name="product_entry_date" VALUE="<?php echo $product_entry_date ?>"><br><br>
								<input type="text" name="product_id" VALUE="<?php echo $product_id ?>"hidden>
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