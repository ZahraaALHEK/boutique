<?php
require_once ('connect.php');

// Initialize the session
session_start();
 


if(isset($_POST) & !empty($_POST)){
	$p_id = ($_POST['p_id']);
	$p_name = ($_POST['p_name']);
	$u_id = ($_POST['u_id']);
	$u_name = ($_POST['u_name']);
	$quantity = ($_POST['quantity']);
	//$phone = ($_POST['phone']);
	//$address = ($_POST['address']);

	$_SESSION['p_id'] = $p_id;
    $_SESSION['p_name'] = $p_name;
    $_SESSION['u_id'] = $u_id;
	$_SESSION['u_name'] = $u_name;
    $_SESSION['quantity'] = $quantity;
	
   // $_SESSION['phone'] = $phone;
	//$_SESSION['address'] = $address;


		//$result;
	$CreateSql1 = "INSERT INTO cart (user_id) VALUES 
    ('$u_id')";
	$res1 = mysqli_query($connection, $CreateSql1) or die(mysqli_error($connection));
	

	
	$sql = "SELECT id FROM cart WHERE user_id =". $u_id . "ORDER BY created_at DESC LIMIT 1";
	$result = mysqli_query($connection, $sql);
	
	if ($result && mysqli_num_rows($result) > 0) {
	  // retrieve the cart ID from the first row of the result set
	  $row = mysqli_fetch_assoc($result);
	  $cart_id = $row['id'];
	} else {
	  // no cart found for the user, create a new one
	  $sql = "INSERT INTO cart (user_id) VALUES ($u_id)";
	  mysqli_query($connection, $sql);

	  $sql = "SELECT price FROM products WHERE id = ". $p_id;
	  $result = mysqli_query($connection, $sql);
	  
	  if ($result && mysqli_num_rows($result) > 0) {
		// retrieve the price value from the first row of the result set
		$row = mysqli_fetch_assoc($result);
		$p_price = $row['price'];
	  } else {
		// no product found with the given ID
		$p_price = 0; // or any default value
	  }
	  

	  $price = $p_price * $quantity;

	  $CreateSql2 = "INSERT INTO purchases (cart_id, product_id, quantity, price ) VALUES('1' ,'$p_id' ,'$quantity' , '$price' )";
	$res2 = mysqli_query($connection, $CreateSql2) or die(mysqli_error($connection));
	if($res1 && $res2){
		$smsg = " Successful.";
	}else{
		$fmsg = " Not Successful. Please try again later.";
	}
}}
?>
<?php require('templates/header.php') ?>

	<div class="d-flex mt-4 mx-4">
        <h1>Welcome, 
        	<b><?php // check user login and output username
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			    echo $_SESSION['username'] . "!";
			} else {
			    echo "Guest !";
			}
        	?></b> 	
        </h1>
    </div>

    <div class="d-flex my-2">
	<?php // output success or failed message.
      	if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
    <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    </div>
	
	<div class="row main-section">
      <?php 
		$SelSql = "SELECT * FROM `products`";
		$res = mysqli_query($connection, $SelSql);
		$num_of_rows = mysqli_num_rows($res);
		if ($num_of_rows > 0) {
	    	// output data of each row
		    while($num_of_rows > 0) {
		    	$num_of_rows--;
		    	$r = mysqli_fetch_assoc($res);
		        include('templates/product.php');
		    }
		} else {
		    echo "No Products";
		}
	?>
	</div><?php  ?>
	
	</div>


<?php require('templates/footer.php') ?>