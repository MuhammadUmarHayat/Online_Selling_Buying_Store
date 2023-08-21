

<?php include 'config.php'; ?>

<?php
if(isset($_POST['login']))
{
	$userType=$_POST["userType"];
	$userid = $_POST['userid'];
	$password = $_POST['password'];

	if($userType=="admin")
		{
			$query="SELECT * FROM  `admins` where  `userid`= '$userid' and  `password`='$password' ";
	
	 		$result = mysqli_query($con, $query);
            	if ($result->num_rows > 0) 
					{
						session_start();
						$_SESSION['userid'] =$userid;
						header('Location:'.'admin/index.php');
				
					}
				else{
				
				echo"Wrong user id or password";
					}

		}
		else if($userType=="buyer")
		{
	
			$query="SELECT * FROM  `users` where  `userid`= '$userid' and  `password`='$password' ";
	
	 		$result = mysqli_query($con, $query);
            	if ($result->num_rows > 0) 
					{
						session_start();
						$_SESSION['userid'] =$userid;
						header('Location:'.'buyer/index.php');
				
					}
				else{
				
				echo"Wrong user id or password";
					}
		}
		if($userType=="seller")
		{
	
			$query="SELECT * FROM   `users` where  `userid`= '$userid' and  `password`='$password' ";
	
	 		$result = mysqli_query($con, $query);
            	if ($result->num_rows > 0) 
					{
						session_start();
						$_SESSION['userid'] =$userid;
						header('Location:'.'seller/index.php');
				
					}
				else{
				
				echo"Wrong user id or password";
					}
		}
	
}



?>







<?php include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    
    <section>
    <form method="post" action="login.php">
<div class="center">

<table>
<tr>
<td> <label for="userType">Choose User Type</label></td> 
    <td>
<select name="userType" id="userType">
  <option value="admin">Admin</option>
  <option value="buyer">Buyer</option>
  <option value="seller">Seller</option>
  
</select>
 </td>   </tr>
<tr> <td>User ID <span class="error" >*</span ></td> <td><input type="text" name="userid" required>    </td>   </tr>
<tr><td>Password <span class="error" >*</span ></td> <td><input  type="password" name="password" required> </td>   </tr>

<tr> <td>   </td>
 <td> <button type="submit" name="login"> Login </button>  </td>   </tr>


</table>

</div>
</form>
    </section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>
