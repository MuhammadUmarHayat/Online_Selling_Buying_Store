

<?php
include '../config.php';

 $countUsers="SELECT count(`userid`) AS total_users FROM `users`";
$result = mysqli_query($con, $countUsers); 
$row = mysqli_fetch_assoc($result); 
 $total_users = $row['total_users'];

 $countProducts="SELECT count(`id`) AS total_products FROM `products`";

 $result = mysqli_query($con, $countProducts); 
 $row = mysqli_fetch_assoc($result); 
  $total_products=$row['total_products'];

 $countCategories="SELECT count(`id`) AS total_categories FROM `categories`";
 $result = mysqli_query($con, $countCategories); 
 $row = mysqli_fetch_assoc($result); 
 $total_categories=$row['total_categories'];

 $countEarning="SELECT sum(`total`) AS total_earning FROM `orders`";
$result = mysqli_query($con, $countEarning); 
$row = mysqli_fetch_assoc($result); 
 $total_income=$row['total_earning'];


 $countOrders="SELECT count(`id`) AS total_orders FROM `orders`";
 $result = mysqli_query($con, $countOrders); 
 $row = mysqli_fetch_assoc($result);
  $total_orders=$row['total_orders'];

?>




<?php include_once "header.php"; ?>



<main>
<section>
    <?php include_once "nav.php"; ?>
    </section>
  
  
    <section>
    <!-- main content here -->
    <?php 
     session_start();
     
    if($_SESSION['userid']==null)
    {
    }
    else
    {
       $userid=$_SESSION['userid'];
       echo "<h2> Welcome ". $userid."</h2>";
    }
 

    ?>

<table>
    <tr><td>Total Views</td><td>15450</td></tr>
    <tr><td>Total Registrations</td><td><?php echo $total_users ?></td></tr>
    <tr><td>Total Products</td><td><?php echo $total_products; ?></td></tr>
    <tr><td>Total categories</td><td><?php echo $total_categories; ?></td></tr>
    <tr><td>Total Orders</td><td><?php echo $total_orders ?></td></tr>
    <tr><td>Total Income</td><td><?php echo $total_income?></td></tr>
</table>


</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>