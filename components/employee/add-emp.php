<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if(isset($_POST) & !empty($_POST)){
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	//$id = ($_POST['id']);
	$salary = ($_POST['salary']);
	$hash=password_hash($password, PASSWORD_DEFAULT);
    $query1 = "INSERT INTO `users` (username,password,role) VALUES ('$username','$hash','employee')";
	$res1 = mysqli_query($connection, $query1);

	
		// Get the auto-generated ID of the newly inserted user
		$new_user_id = mysqli_insert_id($connection);
		

	$query2 = "INSERT INTO `employee` (username,password,u_id,salary) VALUES ('$username','$hash','$new_user_id','$salary')";
	$res2 = mysqli_query($connection, $query2);

	if($res2 ){
		header('location: viewempl.php');
	}else{
		$fmsg = "Failed to Insert data.";
		
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Add New employee</h2>
		<form method="POST" action="add-emp.php" enctype="multipart/form-data">
			<!-- <div class="form-group">
                <label>id</label>
				<input type="text" id="id" class="form-control" name="id" value="" required/>
            </div>  -->
            <div class="form-group">
                <label>username</label>
				<input type="text" class="form-control" name="username" value=""/>
            </div> 
			<div class="form-group">
                <label>password</label>
				<input type="text" class="form-control" name="password" value="" required/>
            </div> 
            <div class="form-group">
                <label>salary</label>
				<input type="number" class="form-control" name="salary" value="" required/>
            </div> 
            
            
			<input type="submit" class="btn btn-primary" value="Add employee" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>