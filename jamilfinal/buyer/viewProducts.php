<?php include '../config.php';?>

<?php
session_start();// start the session
$customerID;
if(isset($_POST['checkout']))
{
	header('Location:'.'checkout.php');
}
if($_SESSION['userid']==null)
{
}
else
{
    $customerID=$_SESSION['userid'];
  
}


 $productid=$_GET['id'];

$_SESSION["productid"] =$productid;
$productid=$_SESSION["productid"];

if(isset($_POST['done']))//add to cart
{
	
	$cusId = $customerID;
            $productid=$_POST['id'];
			
 $result = $con->query("SELECT * FROM products where id= '$productid'"); 

 if($result->num_rows > 0)
 {
	 
	$row = $result->fetch_assoc();
	
$price = $row['price'];
			
$qty=	$_POST['qty'];		
	$TotalPrice=$price*$qty;


                                              echo"<br> cusId ".$cusId." productid ".$productid." price ".$price." qty ".$qty." TotalPrice ".$TotalPrice;
	
			$status="added";
            $q1="INSERT INTO `carts`(`customerid`, `productid`, `qty`, `unitprice`, `total`, `status`) VALUES ('$cusId','$productid','$qty','$price','$TotalPrice','$status')";	
//$q1="INSERT INTO `plants_cart`(`plantid`, `customerid`, `unitprice`, `qty`, `total`, `remarks`) VALUES ('$productid','$cusId','$price','$qty','$TotalPrice','$status')";	
			$query = mysqli_query($con,$q1);
 	echo"thank you";
	
	header('Location:http://localhost/jamilfinal/buyer/index.php');
 }
	
	
	
	
	
	
}



$result = $con->query("SELECT * FROM `products` WHERE `id`='$productid'"); 

 
	
	

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



    if ($result->num_rows > 0) 
    {
       while ($row = $result->fetch_assoc())
        {

    ?>

<div class="card">
    <form action="viewProducts.php" method="post">
<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100% />
<h3><?php echo $row['title'] ?></h3>
  <p class="price"><?php echo $row['price'] ?></p>
 <p> <h4><?php echo $row['description'] ?></h4></p>
 <input type="hidden" id="id" name="id" value="<?php echo $row['id']?>">
 <p>Quantity:
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
</select>
        </p>
  <p><button id="done" name="done">Add to Cart</button></p>
  
      </form>
</div>


<?php
        }
    }
?>

</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>