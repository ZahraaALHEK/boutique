<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/boutique/";

require_once($path . 'connect.php');

$id = $_GET['id'];


$query = "SELECT u_id FROM employee WHERE id = '$id'";
$result = mysqli_query($connection, $query);


if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $u_id = $row['u_id']; // Retrieved u_id
    echo "User ID (u_id): " . $u_id;
} else {
    echo "No employee found with ID: " . $id;
}

$DelSql = "DELETE FROM `employee` WHERE id=$id";
$res = mysqli_query($connection, $DelSql);

$DelSql2 = "DELETE FROM `users` WHERE id=$u_id";
$res2 = mysqli_query($connection, $DelSql2);
if($res && $res2){
	header('location: viewempl.php');
}else{
	echo "Failed to delete";
}
?>