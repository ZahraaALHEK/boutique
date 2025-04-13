

<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";
include('connect.php');
$id= $_GET['id'];
$up=mysqli_query($connection,"SELECT * FROM `products` WHERE id=$id");
$data = mysqli_fetch_array($up); 


?>
<!DOCTYPE html>/

<html lang="en"
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>validation</title>
    
</head>
<body>
<?php require($path . 'templates/header.php') ?>
<center>
    <dev class="main">
    <form action="insertcart.php" methode="POST"><br>
        <h2> are you sure ?</h2>
        
        <imput  type="text"    name="id"  value='<?php echo $data['id'] ?>'>
        <imput  type="text"    name="name" value='<?php echo $data['name'] ?>'>
        <imput  type="text"    name="price" value='<?php echo $data['price'] ?>'>
        <button type="submit"  name="add" value='<?php echo $data['id']?>' class='btn btn-worning'>yes </button>
    </form>

    </dev>
</center>
<?php require($path . 'templates/footer.php') ?>
</body>
</html>