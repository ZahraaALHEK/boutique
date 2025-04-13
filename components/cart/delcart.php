
    
        <?php
        include('connect.php');
        $id=$_GET['id'];
        mysqli_query($connection,"DELETE FROM addcart WHERE id=$id");
        header('location: card.php');
        ?>
    