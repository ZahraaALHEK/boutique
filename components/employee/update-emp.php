
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

$id = $_GET['id'];
$SelSql = "SELECT * FROM `employee` WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
	$id = ($_POST['id']);
	$name = ($_POST['username']);
	$salary = ($_POST['salary']);
	

    // Execute query
	$query = "UPDATE `employee` SET  username='$name', salary='$salary' WHERE id='$id'";
	
$query1 = "SELECT u_id FROM employee WHERE id = '$id'";
$result = mysqli_query($connection, $query1);


if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $u_id = $row['u_id']; // Retrieved u_id
    echo "User ID (u_id): " . $u_id;
} else {
    echo "No employee found with ID: " . $id;
}


	$query2 = "UPDATE `users` SET  username='$name' WHERE id='$u_id'";
	$res = mysqli_query($connection, $query);
	$res2 = mysqli_query($connection, $query2);

	if($res2 && $res){
		header('location: viewempl.php');
	}else{
		$fmsg = "Failed to Insert data.";
		//print_r($res->error_list);
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Add New employee</h2>
		<form method="post" enctype="multipart/form-data">
			
			
                
				 <input type="hidden" class="form-control" name="id" value="<?php  echo $r['id'];?>" /> 
            
            <div class="form-group">
                <label>name</label>
				<input type="text" class="form-control" name="username" value="<?php echo $r['username'];?>"/>
            </div> 
            <div class="form-group">
                <label>New salary</label>
				<input type="text" class="form-control" name="salary" value="<?php echo $r['salary'];?>" required/>
            </div> 
            
            
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>