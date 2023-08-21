<?php include_once "header.php"; ?>
<main>
    <section>
        <div style="background-color:gray;">
     <?php 
     session_start();
     session_destroy();
    ?>
    <h2>Your session has been expire. To login again <a  href="../login.php" style="text-decoration: none; color:blue;">Click Here</a></h2>
    
    </div></section>
  
    <section>
    <!-- main content here -->
</section>
</main>

<?php include_once "footer.php"; ?>
</body>
</html>