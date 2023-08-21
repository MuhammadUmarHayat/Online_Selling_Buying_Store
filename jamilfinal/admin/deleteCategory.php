
<?php include '../config.php'; 

$id= $_GET['id'];
$statusMsg ="";

$insert = $con->query("DELETE FROM `categories`  where  `id`='$id'"); 
             if($insert){ 
               
                 $statusMsg = "Record has been deleted successfully."; 
            }else{ 
                $statusMsg = "Failed, please try again."; 
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
    }
    else
    {
       $userid=$_SESSION['userid'];
       echo  $statusMsg;
    }



    ?>
</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>