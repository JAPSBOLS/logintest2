<link rel="icon" href="../images/websiteLOGO.png" type="image/png">
<?php
    define("GROOT","");

    // Check if user is not logged in or is not an admin, redirect to login page
    include('auth.php');
    include('config/dbconn.php');
    include('includes/header.php');
    include('includes/navbar.php');
?>
<title>BUP - Thesis Library</title>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('includes/topbar.php');
                ?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <?php if ($_SESSION['auth_role'] !== 'student'): ?>
                        <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <form method="post" action="generate_report.php">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Thesis List
                                </button>
                            </form>
                        </div>
                        <?php endif; ?> 
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Users Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Registered Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="userCount">5</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-child fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total thesis card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                No. of thesis</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="thesisCount">21</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="	fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Available for reservation
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="APText">20%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" id="APBar"
                                                            style="width: 20%" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Reservation Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="PRText">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pie chart of thesis departments -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Thesis by Departments</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="thesisByDept"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie chart of users by departments -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Registered Users by Departments</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="usersByDept"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
  include('includes/footer.php');
  include('includes/scripts.php');
?>
<script src='AnalyticsDashboardImports/pieChartUsers.js'></script>
<script>
    const active = document.getElementById('Dashboard');
    active.classList.add('active');
</script>
 