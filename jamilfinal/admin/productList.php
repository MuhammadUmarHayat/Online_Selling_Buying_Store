<?php include '../config.php'; 
 
// Get image data from database 
$result = $con->query("SELECT * FROM `products` "); 

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
</section>



<section>


<table border=1>
    <tr>
    <th>#</th>
    <th> Category</th>
    <th> Product Name</th>
    <th> Description</th>
    <th> Photo</th>
    <th> Price</th>
    <th> Quantity</th>
    <th> Vendor</th>
    <th> </th>
    <th> </th>
    </tr>
</section>
<?php if($result->num_rows > 0){ ?> 


	
<?php while($row = $result->fetch_assoc()){ ?> 

    
        <tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['category']?></td>
<td><?php echo $row['title']?></td>
<td><?php echo $row['description']?></td>
<td>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=50px height=50px /> </td>
<td><?php echo $row['price']?></td>
<td><?php echo $row['qty']?></td>
<td><?php echo $row['vendor']?></td>
<td><?php  echo '<a style="color: #1BA098; text-decoration: none;"  href="editProduct.php?id=' . $row['id'] .'">Edit Details</a>';
?></td>
<td> <?php echo '<a style="color: #1BA098; text-decoration: none;" href="deleteProduct.php?id=' . $row['id'] .'">Delete Details</a>';
?></td>
</tr>
<?php



} ?> 

<?php }else{ ?> 
<p class="status error">Image(s) not found...</p> 
<?php } ?>

</table>


</main>

<?php include_once "footer.php"; ?>
</body>
</html>