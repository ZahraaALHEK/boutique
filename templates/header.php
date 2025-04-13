<?php 

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/boutique/';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Clothing Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="<?php echo $server; ?>css/style.css" >
 
<!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="navbar-collapse collapse justify-content-between">
			<ul class="navbar-nav" id="navbar">
				
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo $server; ?>index.php"><i class="fa fa-shopping-bag text-white"></i> Shop</a>
				</li>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){ if($_SESSION['role'] == 'employee'){?>
					<li class="nav-item active">
					<a class="nav-link" href="\boutique\templates\profile.php"><i class="fa fa-dark bg-primary"></i> profile</a>
				</li>
				<?php } } ?>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){if( $_SESSION['role'] == 'admin') {
					?><li class="nav-item">
					<a class="nav-link" href="\boutique\components\order\vieword.php">Orders</a>
				</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo $server; ?>components/product/view-product.php">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="\boutique\components\employee\viewempl">Employes</a>
					</li>
					<?php }else if ($_SESSION['role'] == 'employee') {?>
					<li class="nav-item">
					<a class="nav-link" href="\boutique\components\order\vieword.php">Orders</a>
				</li>
					
					<?php }else {?>
				<li class="nav-item">
					<a class="nav-link" href="\boutique\components\order\vieword.php">Order</a>
				</li>
					<li class="nav-item">
						<a class="nav-link" href="\boutique\components\cart\card.php">Cart</a> 
					</li>
				<?php }}
            				?>
			</ul>
			<ul class="navbar-nav">
				<div class="d-flex my-2 my-lg-0">
				    <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				    <button id="searchBtn"class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
				</div>
			</ul>
			<ul class="navbar-nav">
				<!-- <li class="nav-item mr-sm-2">
					<a class="nav-link btn btn-dark text-white" href="<?php // echo $server; ?>cart.php">Cart</a>
				</li> -->
				<?php 
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
					<li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-danger text-white" href="<?php echo $server; ?>logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
					</li>
				<?php } else { ?>
				    <li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</header>

<div class="container-fluid">
