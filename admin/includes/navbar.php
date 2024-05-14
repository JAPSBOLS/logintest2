  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - ADD LOGO HERE-->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text ml-3 mb-3">
            <img src='../images/systemLogo.png' width=280></img>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Admin tools
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="Dashboard">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

<!-- Nav Item - Add/Remove Thesis Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Management</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Options</h6>
            <a class="collapse-item" href="addThesis/add-thesis.php">Add Thesis</a>
            <a class="collapse-item" href="addThesis/remove-thesis.php">Remove Thesis</a>
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-landmark"></i>
            <span>Thesis Library</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-user-friends"></i>
            <span>Contacts</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-question"></i>
            <span>FAQ</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-laugh"></i>
            <span>About Us</span></a>
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
                    <form action="logout.php" method="POST">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout_btn" type="submit">Logout</button>
                    </form>
                 </div>
            </div>
        </div>
    </div>

    <!-- Feedback Form -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel='stylesheet'>
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="logout.php" method="POST">
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

