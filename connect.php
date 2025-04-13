<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    echo"pas de connection";
}
$select_db = mysqli_select_db($connection, 'shop1');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>