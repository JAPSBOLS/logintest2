<?php
   define("GROOT","../admin/");
   include(GROOT."auth.php");
   include(GROOT."includes/header.php");
   include(GROOT."includes/navbar.php");
?>
<title>Contact Us</title>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

      <?php include(GROOT.'includes/topbar.php');?>


            <link rel="stylesheet" href="style.css" />
            <div class="box"> 
                    <form>
                        <h1>Contact Us</h1>
                        <input type="text" id="firstname" placeholder="First Name" required>
                        <input type="text" id="lastname" placeholder="Last Name" required>
                        <input type="email" id="email" placeholder="Email" required>
                        <input type="text" id="mobile" placeholder="Mobile" required>
                        <h4>Type Your Message</h4>
                        <textarea required></textarea>
                        <input type="submit" value="Send" id="button">
                    </form>
            </div>
<?php
  include(GROOT.'includes/footer.php');
  include(GROOT.'includes/scripts.php');
?>
<script src='AnalyticsDashboardImports/pieChartUsers.js'></script>
<script>
    const active = document.getElementById('Contacts');
    active.classList.add('active');
</script>
 