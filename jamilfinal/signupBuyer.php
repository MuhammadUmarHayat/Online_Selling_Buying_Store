


<?php
include 'config.php';
if(isset($_POST['signup']))
{
//register now	
	
	 $data = $_POST;
	
	if (empty($data['name']) ||
    empty($data['password']) ||
    empty($data['userid']) ||
    empty($data['retypePassword'])) 
{
    
    die('Please fill all required fields!');
}

	
if ($data['password'] !== $data['retypePassword']) 
{
   die('Password and Confirm password should match!');   
}


	////name,userid,password,address,phoneNo,email
	
	 $name = $_POST['name'];
	
		 $userid = $_POST['userid'];
		 	 $password = $_POST['password'];
			 	 $retypepassword = $_POST['retypePassword'];
                  $address = $_POST['address'];
                  $phoneNo = $_POST['phoneNo'];
                  $email = $_POST['email'];
                  $status = "active";
	
$usertype="buyer";
		

		                                                                                                  /////////////////////////////////////// `userid`, `email`, `password`, `name`, `mobile`, `address`, `userType`, `status`
		$query="INSERT INTO `users`(`userid`, `email`, `password`, `name`, `mobile`, `address`, `userType`, `status`) VALUES ('$userid','$email','$password','$name','$phoneNo','$address','$usertype','$status')";
	
	$insert = mysqli_query($con,$query);
	
 
 echo '<h2> User is registered  successfully </h2>';

	
	
}



?>




<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    
    <section>
    <form method="post" action="signupBuyer.php">
   
<table>

<tr> <td>Name <span class="error" >*</span ></td> <td><input type="text" name="name" required>    </td>   </tr>
<tr> <td>User ID <span class="error" >*</span ></td> <td><input type="text" name="userid" required>    </td>   </tr>
<tr><td> Password <span class="error" >*</span ></td> <td><input type="password" name="password" required> </td>   </tr>
<tr><td> Retype Password <span class="error" >*</span ></td> <td><input type="password" name="retypePassword" required> </td>   </tr>
<tr> <td>Address<span class="error" >*</span ></td> <td><input type="text" name="address" required>    </td>   </tr>
<tr> <td>Phone Number <span class="error" >*</span ></td> <td><input type="text" name="phoneNo" required>    </td>   </tr>
<tr> <td>Email <span class="error" >*</span ></td> <td><input type="email" name="email" required>    </td>   </tr>
 <td> <button type="submit" name="signup"> Signup </button>  </td>   </tr>
</table>


</form>
    </section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>
