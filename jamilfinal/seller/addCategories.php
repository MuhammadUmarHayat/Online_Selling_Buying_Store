<?php 
include '../config.php';
$message="";

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
        $category = $_POST['category'];
	
        $description = $_POST['description'];
        $query="INSERT INTO `categories`( `category`, `photo`, `description`) VALUES ('$category','$imgContent','$description')";
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
     session_start();
     
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

<form method="post" action="addCategories.php" enctype="multipart/form-data">
    <div class="center">
<table>

<tr> <td>Title </td> <td><input type="text" name="category" required>   <span class="error" >*</span > </td>   </tr>
<tr> <td>Description </td> <td><input type="text" name="description" required>   <span class="error" >*</span > </td>   </tr>

<tr> <td>   
<label>Select Image File:</label></td>
<td> <input type="file" name="image">
     </td>
</tr>
<tr> <td> </td>
 <td> <button type="submit" name="save"> save </button>  </td>   </tr>
</table>
<?php
echo $message;
?>
</div>




</main>

<?php include_once "footer.php"; ?>
</body>
</html>