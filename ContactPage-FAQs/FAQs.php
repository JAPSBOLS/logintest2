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
                  <summary>What is this System?</summary>
                  <p class="text">The Library System is a comprehensive solution for managing thesis information. It allows for the storage and organization of thesis details such as title, author, date published, advisor, and unique thesis code. The system facilitates author and advisor management, ensuring accurate attribution and tracking. It generates unique thesis codes for easy identification and retrieval. Users can search and retrieve theses based on various criteria. The system ensures data security and implements user access control. It offers reporting and analytics capabilities for insights into thesis-related metrics. With a user-friendly interface, the system provides scalability, performance, and efficient data management. Overall, the Library System streamlines thesis information management, enhancing productivity and organization within a library setting.</p>
               </details>
               <details>
                  <summary>Who can use this System?</summary>
                  <p class="text">Exclusive to BUPC students and administrator only</p>
               </details>
               <details>
                  <summary>How can I search for a specific book or thesis in the library system?</summary>
                  <p class="text">To search for a specific book or thesis in the library system, you can utilize the search functionality provided. Simply enter relevant keywords, such as the title, author, or thesis code, into the search bar. The system will then retrieve and display the matching results based on your search criteria. You can further refine your search using filters or advanced search options, if available, to narrow down the results. This allows you to efficiently locate the desired book or thesis within the library system.</p>
               </details>
               <details>
                <summary>How can I log in to the system?</summary>
                <p class="text">To access the system, students are required to enter their student number and default password.</p>
             </details>
             <details>
                <summary>Can the thesis book be borrowed and taken home?</summary>
                <p class="text">The book can be borrowed as long as it remains within the campus premises, meaning that the thesis is available for borrowing but must not be taken off-campus.</p>
             </details>
             <details>
                <summary>How to add or remove a thesis in the system?</summary>
                  <p class="text">To add or remove a thesis from the system, it is necessary to directly request the administrator to handle the addition or removal process. 
                     The administrator holds exclusive authority to add theses into the system.</p>
             </details>
             <details>
                <summary>Tngnamo</summary>
                <p class="text">I don't know</p>
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