<?php
    define("GROOT","../");
    include(GROOT."auth.php");
    include(GROOT."includes/header.php");
    include(GROOT."includes/navbar.php");
    include("getReserveList.php")
?>
<title>Pending Reserve Requests</title>
<link rel="stylesheet" type="text/css" href="myStyle.css">
<script src="myJsScrip.js"></script>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include(GROOT.'includes/topbar.php');?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Reservation Requests</h1>
                    </div>


                    <div class="card p-3">
                        <table id="myTable" class="display">
                            <thead>
                                <tr class="heading">
                                    <th>Reserve ID</th>
                                    <th>Thesis Code</th>
                                    <th>Username</th>
                                    <th>Reserve Date</th>
                                    <th>Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <tr class="data">
                                    <td><?php echo $row['Reserv_ID'];?></td>
                                    <td><a href="../thesisDisplay/thesisdetails.php?Th_Code=<?php echo $row['Th_Code'];?>">
                                        <?php echo $row['Th_Code'];?>
                                    </a></td>
                                    <td><?php echo $row['User_Name'];?></td>
                                    <td><?php echo $row['Reserv_Date'];?></td>
                                    <td><?php echo $row['Return_Date'];?></td>
                                    <td><span class="btn btn-danger btn-sm" onclick="declineReserve('<?php echo $row['Reserv_ID'];?>')">Decline</span></td>
                                    <td><span class="btn btn-success btn-sm" onclick="acceptReserve('<?php echo $row['Th_Code'];?>')">Accept</span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        
                        <?php if(isset($_SESSION['msg'])){ ?>
                        <!-- Confirmation-->
                        <div class="modal fade show" id="confirmModal" tabindex="-1" role="dialog" style="display:block;">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="warningTitle">Notice</h5>
                                    </div>
                                    <div class="modal-body" id="warningText"><?php echo $_SESSION['msg']; ?></div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" onclick="closeDialog()">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['msg']); } ?>
                        <!-- Confirmation end -->
                        
                    </div>
                </div>
            </div>

<?php
    include(GROOT.'includes/footer.php');
    include(GROOT.'includes/scripts.php');
?>
<script>
    const active = document.getElementById('Pendings');
    active.classList.add('active');
</script>
 