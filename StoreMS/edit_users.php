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
		<title> Edit Users</title>
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
									
									$sql = "SELECT * FROM  users WHERE user_id = $getid";
									
									$query = $conn->query($sql);
									
									$data = mysqli_fetch_assoc($query);
									$user_id    			 = $data['user_id'];
									$user_first_name 		 = $data['user_first_name'];
									$user_last_name	 	 	 = $data['user_last_name'];
									$user_email 			 = $data['user_email'];
									$user_password 			 = $data['user_password'];
								}
								if(isset($_GET['user_first_name'])){
									$new_user_first_name	 = $_GET['user_first_name'];
									$new_user_last_name 	 = $_GET['user_last_name'];
									$new_user_email		     = $_GET['user_email'];
									$new_user_password	 	 = $_GET['user_password'];
									$new_user_id 		     = $_GET['user_id'];
									
									$sql1 = "UPDATE users SET user_first_name = '$new_user_first_name',
													user_last_name		 = '$new_user_last_name',
													user_email 	 = '$new_user_email'
													WHERE user_id  	 = $new_user_id";
													
									if($conn->query($sql1) == TRUE){
											echo 'Update Successfull';
											header('location:list_of_users.php');					
										}else{
											echo "Error updating record:".$conn->error;
										}
								}
							?>
						
							
							
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
								User's First Name:<br>
								<input type="text" name="user_first_name" value="<?php echo $user_first_name ?>"><br><br>
								User's Last Name:<br>
								<input type="text" name="user_last_name" value="<?php echo $user_last_name ?>"><br><br>
								User's Email:<br>
								<input type="email" name="user_email" value="<?php echo $user_email ?>"><br><br>
								User's Password:<br>
								<input type="password" name="user_password" value="<?php echo $user_password ?>"><br><br>
								<input type="text" name="user_id" value="<?php echo $user_id ?>"hidden>
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