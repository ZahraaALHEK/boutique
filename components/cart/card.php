

<!DOCTYPE html>


<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>my cart</title>
</head>
<body>
<?php 
session_start();
 

include('connect.php');
$u_id=$_SESSION["id"];
$up=mysqli_query($connection,"SELECT * FROM `addcart` WHERE u_id=$u_id ");
//add where id=u_id for show the cart in selected user
while($data=mysqli_fetch_array($up)){

echo "
<center>
    <main>
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>name product</th>
                    <th scope='col'>price product</th>
                    <th scope='col'>delete product</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> $data[name] </td>
                    <td> < $data[price]   </td>
                    <td> <a href='delcart.php?  id= $data[id]' class='btn btn-danger'>delete</a></td>
                </tr>
            </tbody>

        </table>
        
    </main>
</center>"

;}
?>
<?php 
$sql = "SELECT SUM(price) as total_price FROM addcart  WHERE u_id=$u_id";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
 $row = mysqli_fetch_assoc($result);
 $total_price = $row['total_price'];
 echo "Total price: $" . $total_price;"<br>"; 
}
?>
<form method="post" action="
insetord.php"method="post">

<div class="container">
  <h2>Go to order</h2>
  <!-- Trigger the modal with a button -->
  
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buy now</button>
   
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <form method="post" action="insetord.php"method="post">

        <div class="modal-body">
          
			     <div class="form-group">
					    <label>Contact</label>
					    <input type="text" name="phone" class="form-control" placeholder="contact number" required="true">
					</div>
					<div class="form-group">
					    <label>Delivery Address</label>
					    <input type="text" name="address" class="form-control" placeholder="Delivery Address" required="true">
					</div>
			</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        <button type="submit" class="btn btn-primary">Confirm</button>
			      </div>
    </div>
  </div>


</div>

</form>		
</body>
</html>