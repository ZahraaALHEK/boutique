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
   mysqli_query($connection ,$insert);
   header('location: vieword.php');



?>