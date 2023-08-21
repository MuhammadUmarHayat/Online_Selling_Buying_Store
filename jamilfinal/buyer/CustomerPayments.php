<?php include '../config.php';
session_start();
?>
<?php 

	$customerID="";
$amount=0;
$customerID=$_SESSION["userid"] ;

	
 
$result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$amount=$sum ;
//echo "<br> <h2>Total Amount : ".$sum."</h2>";

if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
	
	// echo "$fname Refsnes.<br>";
 	try 
	{ 
       //empty the cart when order is places
 
			
          $cusID = $customerID;
           
			 $status = "paid";
			 $bankname= $_POST['bankname'];
			          $accountNumber= $_POST['accountNumber'];
					  
		$method= $_POST['methods'];		  
				
	 
	
	//save order////////////////
	
	$orderid=rand(111,999);
	$_SESSION["orderid"]=$orderid;
$result = $con->query("SELECT * FROM `carts` WHERE customerid='$customerID'"); 
 if($result->num_rows > 0)
 { 

 while($row = $result->fetch_assoc())
 {
	
	 
	//echo $row['id']."-".$row['customerid']."-".$row['plantid']."-".$row['unitprice']."-".$row['qty']."-".$row['total']."<br>";
	
	$cusId=$row['customerid'];
	
	$productid=$row['productid'];
	$price=$row['unitprice'];
	$quantity=$row['qty'];
	$status="paid";
	$total=$row['total'];
	
	$date=date("Y/m/d");
    
            $q1="INSERT INTO `orders`( `customerid`, `productId`, `price`, `quantity`, `total`, `date`, `status`,`order_number`) VALUES ('$cusId','$productid','$price','$quantity','$total','$date','$status','$orderid')";
			 $query = mysqli_query($con,$q1);	


$result1 = $con->query("SELECT * FROM  `products` WHERE `id`='$productid'"); 
 if($result1->num_rows > 0)
 { 

 $row1 = $result1->fetch_assoc();
 
$title=$row1['title'];
$productid12=$row1['id'];

$status="sold";
$date=date("Y/m/d");

$q12="INSERT INTO `sale_products`(`title`, `product_id`, `qty`, `status`, `date_of_sale`) VALUES ('$title','$productid12','$quantity','$status','$date')";
 $query12 = mysqli_query($con,$q12);	

 
 
 }



	
 }//end loop
 
 
	
	$q2="DELETE FROM `carts`";
			 $query = mysqli_query($con,$q2);	

 
}
else{
	
	
	echo "please select payment method first";
}
	
	
			$query="";
	
			$accountTitle=$bankname;
			$accountNo=$accountNumber;
			$receivedBy="seller";
			$status="paid";
			$createdat=date("Y-m-d");                                                                                  
		echo	 $q1="INSERT INTO `payments`( `orderId`, `customerId`, `amount`, `receivedBy`, `Date`, `status`) VALUES ( '$orderid`,'$cusID', '$amount','$receivedBy','$createdat','$status')";
			 $query = mysqli_query($con,$q1);	
			
			header('Location:http://localhost/jamilfinal/buyer/ThankYou.php');
				echo 'Thank you for payment!';
				
				
		
			
	}
	
	
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
 
		
	}
	

else
{
	
	
	
	echo "Please fill the form first";
}
}




?>
<!-- GUI -->
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
       echo "<h2> Buyer ID ". $userid."</h2>";
    }
?>
<form method="POST" action="CustomerPayments.php">
<center>
<table>
				
				<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="cod") echo "checked";?>
 value="cod">Cash on Delivery<br>
  <input type="radio" name="methods"
  <?php if (isset($methods) && $methods=="online") echo "checked";?> value="online">Online Banking<br>
  <br>
				
				
				
				
				
				
				
				
				
				<tr><td> Enter cusID:</td><td> <?php  echo $customerID; //$amount?></td></tr>
				
		<tr><td> Enter  Bank Name(for online banking):</td><td> <input type="text" name="bankname"></td></tr>		
				
				 <tr><td> Enter  Account Number (for online banking):</td><td> <input type="text" name="accountNumber"></td></tr>
				
					
				<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>
				
				<tr><td> </td><td> <button type="submit" name="done" >Submit</button></td></tr>			


                    
					</table>
                </form>
</center>      
<?php
       


    $result = mysqli_query($con, 'SELECT SUM(`total`) AS value_sum FROM carts'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
?>

</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>