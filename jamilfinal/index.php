


<?php 

include "config.php";



include_once "header.php"; ?>
<main>
    <section>
    <?php include_once "nav.php"; ?>
    </section>
    <div class="div1">
   <h2> All Categories</h2>
   
   <hr>
  
   
    <?php
    $query = "SELECT * FROM `categories`"; 
    $result = $con->query($query);
            if ($result->num_rows > 0) 
            {
               while ($row = $result->fetch_assoc())
                {
                    ?>
          <div class="card">
          
<p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100px /></p>
<br><p><?php echo $row['category'] ?></p><br>
  
                </div>
      


                
              <?php
                    }
                }
            ?>
</div>
<br><br><br> 
<br><br><br><br><br><br> 
<br><br><br><br><br><br> 
<br><br<br> 
<br><br><br>

<h2>

    Best Products
   
            </h2>
   <hr>
<div class="div1">

    
   
    <?php
    $query = "SELECT * FROM products"; 
    $result = $con->query($query);
            if ($result->num_rows > 0) 
            {
               while ($row = $result->fetch_assoc())
                {
                    ?>
          <div class="card">
    <form action="index.php" method="post">
<p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>" width=100px /></p>
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

   

            </div>

            </section>

</section>
</main>
