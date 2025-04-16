<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');
$id = $_GET['id'];
$SelSql = "SELECT * FROM `orders` WHERE id='$id'";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
if(isset($_POST) & !empty($_POST)){

    $status=($_POST['o_status']);
	$UpdateSql = "UPDATE `orders` SET o_status='$status' WHERE id='$id' ";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('location: vieword.php');
	}else{
		$fmsg = "Failed to Update data.";
	}
}
?>
<?php require($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<form method="post" >
            <div class="form-group">
                <label>Status : </label>
<br>
				<select name="o_status" id="o_status" class="m-3" >
            <option value="1">pending</option>
            <option value="2">shipping</option>
            <option value="3">delivered</option>
            	</select>
<br>
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
	
<?php require($path . 'templates/footer.php') ?>