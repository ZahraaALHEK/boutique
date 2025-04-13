<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

$id = $_GET['id'];
$SelSql = "SELECT * FROM `products` WHERE id=$id";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);


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
    }else {
    	$image = $r['img'];
    }

    // Execute query
	$query = "UPDATE `products` SET name='$name', brand='$brand', price='$price', detail='$detail', img='$image' WHERE id='$id'";
	
	$res = mysqli_query($connection, $query);
	if($res){
		header('location: view-product.php');
	}else{
		$fmsg = "Failed to Insert data.";
		//print_r($res->error_list);
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
				<input type="text" class="form-control" name="name" value="<?php echo $r['name'];?>" required/>
            </div> 
            <div class="form-group">
                <label>Brand</label>
				<input type="text" class="form-control" name="brand" value="<?php echo $r['brand'];?>"/>
            </div> 
            <div class="form-group">
                <label>New Price</label>
				<input type="text" class="form-control" name="price" value="<?php echo $r['price'];?>" required/>
            </div> 
            <div class="form-group">
                <label>Detail</label>
				<input type="text" class="form-control" name="detail" value="<?php echo $r['detail'];?>"/>
            </div> 
            <div class="form-group">
                <label>New Image</label>
				<input type="file" class="form-control" name="image" accept=".png,.gif,.jpg,.webp"/>
            </div> 
			<input type="submit" class="btn btn-primary" value="Update" />
		</form>
	</div>
	
<?php require_once($path . 'templates/footer.php') ?>