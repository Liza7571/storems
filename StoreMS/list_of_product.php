<?php
	session_start();

	require('connection.php');
	
	$user_first_name  = $_SESSION['user_first_name'];
	$user_last_name   = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name)){
	
	$sql1 = "SELECT * FROM category";
	
	$query1 = $conn->query($sql1);
	
	$data_list = array();
	
	while($data1   = mysqli_fetch_assoc($query1)){
	
	$category_id  = $data1['category_id'];
	$category_name = $data1['category_name'];
	
	$data_list[$category_id] = $category_name;
	}
	
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Edit of Product</title>
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
								$sql = "SELECT * FROM product";
								
								$query = $conn->query($sql);
									echo "<table class='table table-success table-striped table-hover'> 
											<tr>
												<th>Product Name</th>
												<th>Category</th>
												<th>Code</th>
												<th>Action</th>
											</tr>";
								while($data = mysqli_fetch_assoc($query)){
									$product_id 		 = $data['product_id'];
									$product_name		 = $data['product_name'];
									$product_category 	 = $data['product_category'];
									$product_code 		 = $data['product_code'];
									
									echo "<tr>
											<td>$product_name</td>
											<td>$data_list[$product_category]</td>
											<td>$product_code</td>
											<td>
												<a href='edit_product.php?id=$product_id'class='btn btn-success'>
													Edit
												</a>
												<a href='#' class='btn btn-danger'>	
													Delete
												</a>
											</td>
										</tr>";
								}
									echo "</table>";
							?>
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
	