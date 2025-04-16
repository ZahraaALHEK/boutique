
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'employee' ) {
	$ReadSql = "SELECT * FROM `orders`";

	
}else{
	$u_id = $_SESSION['id'];
	$ReadSql = "SELECT * FROM `orders` WHERE u_id = '$u_id'";

}
$res = mysqli_query($connection, $ReadSql);

?>
<?php require($path . 'templates/header.php');
if ( $_SESSION['role'] == 'admin') {
	?>
<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>Elite Fashion - Orders</h2>	
		</div>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>Customer Id</th>
				<th>Customer  Name</th>
				<th>Customer  Contact</th> 
				<th>Delivery Address</th> 
				<th>Status</th>
			</tr> 
		</thead> 
		<tbody> 
		<?php 
		
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr> 
				<td><?php echo $r['u_id'];?></td>
				<td><?php  echo $r['u_name']  ?></td>
				<td><?php echo $r['u_contact']; ?></td>
				<td><?php echo $r['u_address']; ?></td> 
			<td><?php if($r['o_status']==0){$n='Picking';}else if($r['o_status']==1){$n='Packing';}else if($r['o_status']==2){$n='Shipping';}else $n='Delivered';
				echo $n; ?></td>
				
			</tr> 
		<?php } ?>
		</tbody> 
		</table>
	</div>  
<?php }elseif ($_SESSION['role'] == 'user') {
	?>

	<div class="container-fluid my-4">
	<div class="row my-2">
		<h2>Elite Fashion - Orders</h2>	
	</div>
	<table class="table "> 
	<thead> 
		<tr> 
			
			<th>Customer  Contact</th> 
			<th>Delivery Address</th> 
			<th>Status</th>
		</tr> 
	</thead> 
	<tbody> 
	<?php 
	
	while($r = mysqli_fetch_assoc($res)){
	?>
		<tr> 
			
			<td><?php echo $r['u_contact']; ?></td>
			<td><?php echo $r['u_address']; ?></td> 
		<td><?php if($r['o_status']==0){$n='canelled';}else if($r['o_status']==1){$n='pending';}else if($r['o_status']==2){$n='Shipping';}else $n='Delivered';
			echo $n; ?></td>
			
		</tr> 
	<?php } ?>
	</tbody> 
	</table>
</div> 

<?php
}
 else{if($_SESSION['role'] == 'employee'){?>
	<div class="container-fluid my-4">
		<div class="row my-2">
			<h2>Elite Fashion - Orders</h2>	
		</div>
		<table class="table "> 
		<thead> 
			<tr> 
			    <th>Customer Id</th> 
				 <th>Customer name </th> 
				<th>Customer Contact</th> 
				<th>Delivery Address</th> 
				<th>Status</th>
			</tr> 
		</thead> 
		<tbody> 
		
		<?php 
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr> 
				<td scope="row"><?php echo $r['id']; ?></td>  	
				<td><?php echo $r['u_name']; ?></td> 			
				<td><?php echo $r['u_contact']; ?></td>
				<td><?php echo $r['u_address']; ?></td> 
				<td><?php  if($r['o_status']==0){$n='canelled';}else if($r['o_status']==1){$n='pending';}else if($r['o_status']==2){$n='Shipping';}else $n='Delivered';
			echo $n;  ?>
				<button type="button" class="btn btn-warning"><a href="update.php?id=<?php echo $r['id']; ?>">Edit</a></button>
				
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">Delete</button>

<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $r['id']; ?>" role="dialog">
	<div class="modal-dialog">
	
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title">Delete Booking</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">
		  <p>Are you sure?</p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		  <a href="deleteord.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger"> Yes, Delete</button></a>
		</div>
	  </div>
	  
	</div>
  </div><?php } ?>

</td>
</tr> 
<?php } ?>
</tbody> 
</table>
</div>  
<?php }?>

<div id="confirm" class="modal hide fade">
<div class="modal-body">
Are you sure?
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal" class="btn">Cancel</button>
</div>
</div>




<?php require($path . 'templates/footer.php'); ?>