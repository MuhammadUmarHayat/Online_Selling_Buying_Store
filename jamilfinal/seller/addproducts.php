<?php 
include '../config.php';
$message="";
session_start();
					$userid=	$_SESSION['userid'];
if(isset($_POST['save']))
{

	
	 $data = $_POST;
	
	if (empty($data['category']) ||
    empty($data['description']) )
{
    
    die('Please fill all required fields!');
}

if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 

        $title = $_POST['title'];

        $category = $_POST['category'];
	
        $size = $_POST['size'];


        $unit = $_POST['unit'];

        $price = $_POST['price'];
	
        $vendor = $_POST['vendor'];
        $qty = $_POST['qty'];

        $manDate = $_POST['manDate'];
	
        $description = $_POST['description'];
        $status="ok";

$authority=$userid;                
        $query="INSERT INTO `products`(`title`, `category`, `photo`, `size`, `unit`, `price`, `vendor`, `qty`, `manDate`, `status`, `description`, `authority`) VALUES ('$title','$category','$imgContent','$size','$unit','$price','$vendor','$qty','$manDate','$status',' $description', '$authority')";
        $insert = mysqli_query($con,$query);
        
     
        $message="Record is added successfully";
    
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
    <!-- main content here -->
    <?php 
     
     
    if($_SESSION['userid']==null)
    {
        header('Location:'.'logout.php');
    }
    else
    {
       $userid=$_SESSION['userid'];
    //    echo "<h2> Welcome ". $userid."</h2>";
    }



    ?>
</section>
<section style=" height: 500px;">
<form method="post" action="addproducts.php" enctype="multipart/form-data">
    <div class="center">
<table>

<tr> <td>Title </td> <td><input type="text" name="title" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Category </td> 
<td>
<select name="category">
    <option disabled selected>-- Select Category--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `category` FROM `categories`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
  <span class="error" >*</span >
      </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" required>   <span class="error" >*</span > </td>   </tr>

<tr> 
    <td>   
<label>Select Image File:</label>
</td>
<td> <input type="file" name="image">
     </td>
</tr>
<tr> <td>Size </td> <td><input type="text" name="size" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td>Unit </td> <td><input type="text" name="unit" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Price </td> <td><input type="number" name="price" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Vendor </td> <td><input type="text" name="vendor" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Quantity </td> <td><input type="text" name="qty" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Manufacturing Date </td> <td><input type="text" name="manDate" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td> </td>
 <td> <button type="submit" name="save"> save </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>


</section>

</main>

<?php include_once "footer.php"; ?>
</body>
</html>