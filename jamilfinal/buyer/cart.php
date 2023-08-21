

<?php include '../config.php';

session_start();// start the session
$result ;
$total=0;
$customerID=$_SESSION['userid'] ;
$result = $con->query("SELECT * FROM `carts` WHERE `customerid`='$customerID'");


?>




<?php include_once "header.php"; ?>



<main>
<section>
    <?php include_once "nav.php"; ?>
    </section>
  
  
    <section>
    <!-- main content here -->

   
    <?php 
    


     
    if($_SESSION['userid']==null)
    {
    }
    else
    {
       $userid=$_SESSION['userid'];
       echo "<h2> Welcome ". $userid."</h2>";
    }
    $result2 = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM `carts`'); 
    $row2 = mysqli_fetch_assoc($result2); 
    $sum = $row2['value_sum'];
    if(empty($sum))
    {
    $sum=0;
    }
    echo "<h3>ToTal Bill=".$sum."</h3>";
?>
<h1>Products in Cart</h1>
<form action="cart.php" method="POST">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
                <th></th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // `id`, `customer`, `productId`, `price`, `qty`, `total`
                    ?>

                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['customerid'] ?></td>
                        <td><?php echo $row['productid'] ?></td>
                        <td><?php echo $row['unitprice'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['total'] ?></td>
                        <td>
                            <a href="editCart.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color:blue;">Edit Quantity</a>
                        </td>
                        <td>
                            <a href="removeCart.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color:blue;">Remove Product</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                // Display a message if there are no items in the cart
                ?>

                <tr>
                    <td colspan="8" style="text-align: center;">No items in the cart.</td>
                </tr>

            <?php
            }
            ?>
        </table>
    </form>  

</section>




</main>
