<?php
    define("GROOT","../");
    include "../auth.php";
    include "../includes/header.php";
    include "../includes/navbar.php";
?>
<title>BU Online Library Add Thesis</title>
        <!-- Content Wrapper -->
        <link rel="stylesheet" href="styleforADD.css">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"></div>
                <?php include('../includes/topbar.php');?>

                <!-- Begin Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Add Thesis</h1>
                    </div>

                    <!-- <div class="back">
                        <a href="../index.php" class="fas fa-arrow-left fa-3x"></a>
                    </div> -->

                    <!-- Alert Message after Submit -->
                    <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
                    ?>
                        <script>
                            swal({
                                title: '<?php echo $_SESSION['status']; ?>',
                                icon: '<?php echo $_SESSION['status_code']; ?>',
                                button: "OK!",
                            });
                        </script>
                    <?php
                        unset($_SESSION['status']);
                        }
                    ?>

                    <hr>
                    <form action="add.php" method="POST" name="thesis-form">
                        <div class="form">
                            <div class="details">
                                <span class="title">INFORMATION FORM</span>
                                <div class="fields">
                                    <div class="input-field">
                                        <label>Thesis Title </label>
                                        <input type="text" placeholder="Enter Thesis Title" required id="Th_Title" name="Th_Title" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label>Author Name: </label>
                                        <input type="text" placeholder="Enter Author Name" required id="Th_Author" name="Th_Author" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label>Date Modified </label>
                                        <input type="date" placeholder="Enter Date" required id="Th_DateModified" name="Th_DateModified" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label for="Th_Department">Department Name </label>
                                        <select id="Th_Department" name="Th_Department" required onkeyup="checkform()">
                                            <option  value="" disabled selected ></option>
                                            <option value="Engineering Department" >Engineering Department</option>
                                            <option value="Computer Studies Department">Computer Studies Department</option>
                                            <option value="Entreprenuer Department">Entreprenuer Department</option>
                                            <option value="Education Department">Education Department</option>
                                            <option value="Nursing Department">Nursing Department</option>
                                            <option value="Technical Vocational Department">Technical Vocational Department</option>
                                            <option value="Technology Department">Technology Department</option>
                                        </select>
                                    </div>
                                    <div class="input-field">
                                        <label>Course </label>
                                        <input type="text" placeholder="'Computer', 'AI', 'Basta'" required id="Th_Course" name="Th_Course" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label>Thematic Area </label>
                                        <input type="text" placeholder="'Innovation and Technology', 'Sustainable Development'" required id="Th_ThematicArea" name="Th_ThematicArea" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label>Advisor </label>
                                        <input type="text" placeholder="basta" required id="Th_Advisor" name="Th_Advisor" onkeyup="checkform()">
                                    </div>
                                    <div class="input-field">
                                        <label>Thesis Code</label>
                                        <input type="text" placeholder="CNH198" required id="Th_Code" name="Th_Code" onkeyup="checkform()">
                                    </div>
                                    
                                    <div class="input-field">
                                        <label for="Th_Category">Category</label>
                                        <select required id="Th_Category" name="Th_Category" onkeyup="checkform()">
                                        <option  value="" disabled selected ></option>
                                            <option value="Development" >Development</option>
                                            <option value="Research" >Research</option>
                                            <option value="Research and Development">Research and Development</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="abstractField">
                                    <div class="abstract-field">
                                        <label>Abstract </label>
                                        <textarea type="text" placeholder="" required id="Th_Abstract" name="Th_Abstract" onkeyup="checkform()"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="formButton" class="button" name="submit" disabled="disabled">SUBMIT</button>
                    </form>

                    <!-- JavaScript Area-->
                    <script src="scripts.js"></script>

                    <!-- Remove Thesis Tab -->
                    <form action="remove-thesis.php" method="POST">
                        <button type="submit" class="remove_button" name="remove_btn"> Want to Remove a Thesis?</button>
                    </form>

                    <?php
                        if(isset($_POST['remove_btn'])){
                            header("Location: remove-thesis.php");
                            exit();
                        }
                    ?>   
                    <script src="scripts.js"></script>

                </div>
                <!-- End of main Content -->
                

<?php
    include "../includes/scripts.php";
    include "../includes/footer.php";
?>

<script>
    const Management = document.getElementById('ManagementSidebar');
    const AddThesis = document.getElementById('AddThesisSidebar');
    Management.classList.add('active');
    AddThesis.classList.add('active');
</script>