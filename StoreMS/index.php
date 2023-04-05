<?php
	session_start();

	$user_first_name  = $_SESSION['user_first_name'];
	$user_last_name   = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name)){

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Store Management System | SMS</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		//<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/all.min.css"/>
		<link rel="stylesheet" href="css/fontawesome.min.css"/>
		
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
						<div class="row p-3">
							<div class="col-sm-3">
							<a/ href="add_category.php"><i class="fa-solid fa-folder-plus fa-5x text-success m-0 p-0"></i></a>
								<p>Add Category</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_category.php"><i class="fa-solid fa-folder-open fa-5x text-success m-0 p-0"></i></a>
								<p>Category List</p>
							</div>
							<div class="col-sm-3">
								<a href="add_product.php"><i class="fa-regular fa-box-open fa-5x text-success m-0 p-0"></i></a>
								<p>Add Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_product.php"><i class="fa-solid fa-bars-staggered fa-5x text-success m-0 p-0"></i></a>
								<p>Product List</p>
							</div>
						</div>
						<hr/>
						<div class="row p-3">
							<div class="col-sm-3">
							<a/ href="add_store_product.php"><i class="fa-light fa-box fa-5x text-success m-0 p-0"></i></a>
								<p>Store Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_store_product.php"><i class="fa-solid fa-folder-open fa-5x text-success m-0 p-0"></i></a>
								<p>Store Product List</p>
							</div>
							<div class="col-sm-3">
								<a href="add_spend_product.php"><i class="fa-regular fa-shop fa-5x text-success m-0 p-0"></i></a>
								<p>Spend Product</p>
							</div>
							<div class="col-sm-3">
								<a href="list_of_spend_product.php"><i class="fa-solid fa-bars-staggered fa-5x text-success m-0 p-0"></i></a>
								<p>Spend Product List</p>
						</div>
						<hr/>
						<div class="row p-3">
							<div class="col-sm-3">
							<a/ href="report.php"><i class="fa-regular fa-cash-register fa-5x text-success m-0 p-0"></i></a>
								<p>Report</p>
							</div>
							<div class="col-sm-3">
							</div>
							<div class="col-sm-3">
							</div>
							<div class="col-sm-3">
						</div>
						<hr/>
						<div class="row p-3">
							<div class="col-sm-3">
							<a/ href="add_users.php"><i class="fa-regular fa-cash-register fa-5x text-success m-0 p-0"></i></a>
								<p>Add User</p>
							</div>
							<div class="col-sm-3">
							<a/ href="list_of_users.php"><i class="fa-regular fa-users fa-5x text-success m-0 p-0"></i></a>
								<p>User List</p
							</div>
							<div class="col-sm-3">
							</div>
							<div class="col-sm-3">
						</div>
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

