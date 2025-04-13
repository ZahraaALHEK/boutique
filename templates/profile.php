

  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/boutique/";
  
  
session_start();
 require_once($path . 'templates/header.php') ;


  $u_id = $_SESSION["id"];
  require_once ('connect.php');
  // SQL query to extract data
$sql = "SELECT id, u_id, salary FROM employee where u_id =$u_id";
$result = $connection->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
// Loop through each row and extract data into variables
while($row = $result->fetch_assoc()) {
$id = $row["id"];
$u_id = $row["u_id"];
$salary = $row["salary"];}}
//$img = $row["img"];

// Do something with the extracted data
echo "<br>";
echo "<p   style=font-size:20px style=color:blue;>Dear employee</p>";
echo "<p  style=font-size:20px > The salary is the amount of processing requests multiplied by $10  </p> ";
echo "<br>";
echo"<p><b style=color:purple;> THANK YOU :) <b> <p>";
echo "<br>";
echo "<h2 > <b style=color:blue;> YOUR ID:</b>" . $id . "</h2> " ;
//echo "U_ID: " . $u_id . "<br>";
echo "<h2><b style=color:blue;> SALARY: </b>" . $salary . "<h2>";
//echo "Image: <img src='" .$image . "'><br>";
//echo "<form method='post' enctype='multipart/form-data'>
//<input type='submit'  value='Add image' />
//</form>";

?>

