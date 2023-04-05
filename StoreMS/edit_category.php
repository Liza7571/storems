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
		<title>Edit Category</title>
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
									
									$sql = "SELECT * FROM category WHERE category_id = $getid";
									
									$query = $conn->query($sql);
									
									$data = mysqli_fetch_assoc($query);
									$category_id		 = $data['category_id'];
									$category_name 		 = $data['category_name'];
									$category_entry_date = $data['category_entry_date'];
								}

								if(isset($_GET['category_name'])){
										$new_category_name 		 = $_GET['category_name'];
										$new_category_entry_date = $_GET['category_entry_date'];
										$new_category_id		 = $_GET['category_id'];
										
										$sql1 = "UPDATE category SET category_name= '$new_category_name',
												category_entry_date='$new_category_entry_date'
												WHERE category_id= $new_category_id";
												
										if($conn->query($sql1) == TRUE){
											
											echo 'Update Successfull';
											header('location:list_of_category.php');
											
										}else{
											echo 'Not update';
										}
								}
							?>
							<form action="edit_category.php" method="GET">
								Category:<br>
								<input type="text" name="category_name" VALUE="<?php echo $category_name ?>"><br><br>
								Category Entry Date:<br>
								<input type="date" name="category_entry_date" VALUE="<?php echo $category_entry_date ?>"><br><br>
								<input type="text" name="category_id" VALUE="<?php echo $category_id ?>"hidden>
								<input type="submit" value="Update" class="btn btn-success">
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