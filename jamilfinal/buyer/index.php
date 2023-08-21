

<?php include '../config.php';

session_start();// start the session
$result ;
$sum ;
$customerID=$_SESSION['userid'] ;

if(isset($_POST['buy']))
{
    $productid=$_POST['id'];
    $_SESSION["productid"]= $productid;
    header('Location:http://localhost/jamilfinal/buyer/viewProducts.php?id='.$productid);
}

if(isset($_POST['checkout']))
{
	header('Location:http://localhost/jamilfinal/buyer/checkout.php');
}

$_SESSION["cartid"]="";
	$cartID="";
 
	$result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM `carts`'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
if(empty($sum))
{
$sum=0;
}
// $query = "SELECT products.* FROM products LEFT JOIN carts ON products.id = carts.productid WHERE carts.id IS NULL";
// $result = $con->query($query);
 
if(isset($_POST['search']))
{
   // echo "cliked";
   $title=$_POST['title'];
    $category=$_POST['title'];
  
   
 $query = "SELECT products.* FROM products LEFT JOIN carts ON products.id = carts.productid WHERE carts.id IS NULL and products.category='$category' or products.title='$title'";
 
 
    $result =$con->query($query);
   
  // var_dump($result);
   
}
else
{
// Get all data from table 
$query = "SELECT products.* FROM products LEFT JOIN carts ON products.id = carts.productid WHERE carts.id IS NULL";
 $result = $con->query($query);
 
}

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

    echo "<h3>ToTal Bill=".$sum."</h3>";
?>
<h1>All Products</h1>
<?php

    if ($result->num_rows > 0) 
    {
       while ($row = $result->fetch_assoc())
        {

    ?>

<div class="card">
    <form action="index.php" method="post">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100% />
<h3><?php echo $row['title'] ?></h3>
  <p class="price"><?php echo $row['price'] ?></p>
 <p> <h4><?php echo $row['description'] ?></h4></p>
 <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
  <p><button id="buy" name="buy">Buy Now</button></p>
  
      </form>
</div>


<?php
        }
    }
?>


</section>




</main>
