
<div class="col-3 my-2">
<div class="card m-auto product" style="width: 20rem;">
	<img class="card-img-top" src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] ?>/boutique/img/products/<?php echo $r['img'];?> ?>" alt="Card image cap">
	<div class="card-body">
		<h4 class="card-title"><?php echo $r['name']; ?></h4>
		<p class="card-text"><?php echo $r['detail']; ?></p>
		<p>$<?php echo $r['price']; ?></p>

		<!-- show form only if the user is logged in -->
		
		<?php 
		//testing
		//$u_id=$_SESSION["u_id"] ;
		//echo $u_id;
 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
		if ($_SESSION['role'] == 'admin'|| $_SESSION['role'] == 'employee') {?>
		<input type="text" name="p_id" value="<?php echo $r['id']; ?>" hidden="hidden" />
			<input type="text" name="p_name" value="<?php echo $r['name']; ?>" hidden="hidden" />
			<input type="text" name="u_id" value="<?php echo $_SESSION['id']; ?>" hidden="hidden" />
			<input type="text" name="u_name" value="<?php echo $_SESSION['username']; ?>" hidden="hidden" />
			
			<?php
		}else{?><form method="GET">
			<input type="text" name="p_id" value="<?php echo $r['id']; ?>" hidden="hidden" />
			<input type="text" name="p_name" value="<?php echo $r['name']; ?>" hidden="hidden" />
			<input type="text" name="u_id" value="<?php echo $_SESSION['id']; ?>" hidden="hidden" />
			<input type="text" name="u_name" value="<?php echo $_SESSION['username']; ?>" hidden="hidden" />
			<div class="d-flex mb-2">
				<label for="qty<?php echo $r['id']; ?>">Quantity</label>
				<input type="number" id="qty<?php echo $r['id']; ?>" name="quantity" class="mx-2" value="1" />
			</div>



			<!-- Button trigger modal -->
			
			<button type="submit" name="add" class="btn btn-primary" data-toggle="modal" data-target="#confirmOrder">
<span class="text-white"><i class="fa fa-shopping-cart text-white"></i><a href='<?php echo 'http://' . $_SERVER['SERVER_NAME'] ?>/boutique/components/cart/val.php? id=<?php echo $r['id']?>'> Add to cart </a>
 </span>
			</button>

			

		</form>
		<?php }}else echo "sign in to buy"; ?>
	</div>
</div>
</div>