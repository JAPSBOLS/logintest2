<link rel="icon" href="images/websiteLOGO.png" type="image/png">
<div class="bg">
  <title>BUP Thesis Library</title>
  <?php
    define("GROOT","");
    include('includes/header.php');
    include('includes/navbar.php');
    include('includes/footer.php');
    ?>
</div>

<style>
  .bg{
    width: 100%;
    height: 100%;
    background-image: url(images/HOMEBG3.png);
    background-size: cover; 
    background-repeat: no-repeat; 
    background-position: center; 
    background-attachment: fixed;
  }

</style>
<script>
  var active = document.getElementById("home");
  active.classList.add("active");
</script>