<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');
session_start();


    //include('boutique/vieword.php');
    $u_id=$_SESSION["id"] ;
   $username=$_SESSION["username"] ; 
   $contact=$_POST['phone'];
   $address=$_POST['address'];
  include('boutique/vieword.php');
$insert="INSERT INTO `orders` (u_id,u_name,u_contact,u_address) VALUES ('$u_id', '$username', '$contact','$address')";
   
if (mysqli_query($connection ,$insert)) {
   $query = "DELETE FROM addcart";
$result = mysqli_query($connection, $query);

if ($result) {
   header('location: vieword.php');
} else {
    echo "Error deleting records: " . mysqli_error($connection);
}
}

   



?>