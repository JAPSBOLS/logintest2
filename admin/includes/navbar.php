  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position:fixed">

    <!-- Sidebar - ADD LOGO HERE-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-text ml-3 mb-3">
            <img src='<?php echo GROOT;?>../images/SIDELOGO.png' height= 35 width=210 style="margin-left: -10px;">  </img>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Admin tools
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="Dashboard">
        <a class="nav-link" href="<?php echo GROOT;?>index.php" style="z-index:;">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Add/Remove Thesis Collapse Menu -->
    <?php if ($_SESSION['auth_role'] !== 'student'): ?>

        


        <li class="nav-item" id="Pendings">
            <a class="nav-link" href="<?php echo GROOT;?>PendingReservesRequest/" style="z-index:5;">
                <i class="fas fa-cubes"></i>
                <span>Pending Requests</span>
            </a>
        </li>

        <li class="nav-item" id="ReservedList">
            <a class="nav-link" href="<?php echo GROOT;?>reservedList/" style="z-index:5;">
                <i class="fas fa-dragon"></i>
                <span>Reservation List</span>
            </a>
        </li>

        <li class="nav-item" id="ManagementSidebar">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Options</h6>
                    <a class="collapse-item" id="AddThesisSidebar" href="<?php echo GROOT;?>addThesis/add-thesis.php">Add Thesis</a>
                    <a class="collapse-item" id="RemoveThesisSidebar" href="<?php echo GROOT;?>addThesis/remove-thesis.php">Remove Thesis</a>
                </div>
            </div>
        </li>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item" id="thesisLibrary">
        <a class="nav-link" href="<?php echo GROOT;?>thesisDisplay/thesissearchsortandfilter.php">
            <i class="fas fa-landmark"></i>
            <span>Thesis Library</span></a>
    </li>
    
    <li class="nav-item" id="myReservations">
        <a class="nav-link" href="<?php echo GROOT;?>my_reservations/my_reservations.php">
            <i class="fas fa-bookmark""></i>
            <span>My Reservations</span></a>
    </li>


    <li class="nav-item" id="Reviews">
        <a class="nav-link" href="<?php echo GROOT;?>user_reviews/" style="z-index:5;">
            <i class="fas fa-thumbs-up"></i>
            <span>User Reviews</span>
        </a>
    </li>


    <li class="nav-item" id="FAQ">
        <a class="nav-link" href="<?php echo GROOT;?>../FAQs/FAQs.php">
            <i class="fas fa-question"></i>
            <span>FAQ</span></a>
    </li>

</ul>

<!-- End of Sidebar -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="<?php echo GROOT;?>logout.php" method="POST">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout_btn" type="submit">Logout</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>

    <script src=""></script>



   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

