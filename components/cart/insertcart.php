<?php
session_start();
 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

 

//if(isset($_POST['add'])){
   /// echo "<h1>" .$_POST['id'] ."</h1>";
    //$name=$_POST['name'];
    //$price=$_POST['price'];}
    $id=$_GET['add'];
    //$username=$_post['username']
$up=mysqli_query($connection,"SELECT * FROM `products` WHERE id=$id");
$data = mysqli_fetch_array($up);
//$query=mysqli_query($connection,"--SELECT * FROM `users` WHERE  role='buyer'");
//$up = mysqli_fetch_array($query); 
include('boutique/card.php');
$u_id=$_SESSION["id"] ;
  $id=$data['id'];
  $name=$data['name'];
  $price=$data['price'];
 $_SESSION['u_id'] = $u_id;
//  $_SESSION['id'] = $id;
    $_SESSION['name'] =$name;
    $_SESSION['price'] = $price;
 $insert="INSERT INTO `addcart` (id,u_id,name, price) VALUES ('$id','$u_id' ,'$name', '$price')";
mysqli_query($connection ,$insert);
header('location: card.php');
?>