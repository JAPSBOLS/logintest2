<?php
   define("GROOT","../admin/");
   include(GROOT."auth.php");
   include(GROOT."includes/header.php");
   include(GROOT."includes/navbar.php");
?>
<title>FAQs</title>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

      <?php include(GROOT.'includes/topbar.php');?>

       <link rel="stylesheet" href="style2.css" />       
        <div class="box">
            <p class="heading">FAQs</p>
            <div class="faqs">
               <details>
                  <summary>What is this shit?</summary>
                  <p class="text">idk</p>
               </details>
               <details>
                  <summary>Who can use this shit?</summary>
                  <p class="text">NIggas</p>
               </details>
               <details>
                  <summary>Why are you black?</summary>
                  <p class="text">Coz I'm nigga</p>
               </details>
               <details>
                <summary>Bakit ka NIgga?</summary>
                <p class="text">idk</p>
             </details>
             <details>
                <summary>Bicycle kaba??</summary>
                <p class="text">idk</p>
             </details>
             <details>
                <summary>Bakal kaba?</summary>
                <p class="text">idk</p>
             </details>
             <details>
                <summary>Tngnamo</summary>
                <p class="text">idk</p>
             </details>
            </div>
         </div>
<?php
  include(GROOT.'includes/footer.php');
  include(GROOT.'includes/scripts.php');
?>
<script src='AnalyticsDashboardImports/pieChartUsers.js'></script>
<script>
    const active = document.getElementById('FAQ');
    active.classList.add('active');
</script>
 