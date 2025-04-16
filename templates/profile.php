

  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/boutique/";
  
  
session_start();
 require_once($path . 'templates/header.php') ;


  $u_id = $_SESSION["id"];
  require_once ($path . 'connect.php');
  // SQL query to extract data
$sql = "SELECT* FROM employee where u_id =$u_id";
$result = $connection->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
// Loop through each row and extract data into variables
while($row = $result->fetch_assoc()) {
$id = $row["id"];
$name = $row['username'];
$u_id = $row["u_id"];
$salary = $row["salary"];}}
//$img = $row["img"];

// Do something with the extracted data
?>
<div class="wrapper mx-auto">
<h2> YOUR ID : <?php echo $id ;?>
<h2> NAME: <?php echo $name ; ?>
<h2> SALARY: <?php echo $salary ; ?>
</div>



