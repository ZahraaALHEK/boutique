<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

// Initialize the session
session_start();
if(isset($_POST) & !empty($_POST)){
	$name = ($_POST['name']);
	$brand = ($_POST['brand']);
	$price = ($_POST['price']);
	$detail = ($_POST['detail']);
	// store n upload image
    $image = $_FILES['image']['name']; 
    $dir="../img/products/";
    $temp_name=$_FILES['image']['tmp_name'];
    if($image!="")
    {
        if(file_exists($dir.$image))
        {
            $image= time().'_'.$image;
        }
        $fdir= $dir.$image;
        move_uploaded_file($temp_name, $fdir);
    }

    // Execute query
	$query = "INSERT INTO `products` (name, brand, price, detail, img) VALUES ('$name', '$brand', '$price', '$detail', '$image')";
	$res = mysqli_query($connection, $query);
	if($res){
		header('location: view-product.php');
	}else{
		$fmsg = "Failed to Insert data.";
		
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

	<div class="container">
	<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<h2 class="my-4">Add New Product</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label>Name</label>
				<input type="text" id="id" class="form-control" name="name" value="" required/>
            </div> 
            <div class="form-group">
                <label>Brand</label>
				<input type="text" class="form-control" name="brand" value=""/>
            </div> 
            <div class="form-group">
                <label>Price</label>
				<input type="number" class="form-control" name="price" value="" required/>
            </div> 
            <div class="form-group">
                <label>Detail</label>
				<input type="text" class="form-control" name="detail" value=""/>
            </div> 
            <div class="form-group">
                <label>Image</label>
				<input type="file" class="form-control" name="image" accept=".png,.gif,.jpg,.webp" required/>
            </div> 
			<input type="submit" class="btn btn-primary" value="Add Product" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>