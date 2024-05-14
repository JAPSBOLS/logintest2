
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thesis Management System</title>
    <meta charset="UTF-8">
    <meta name="description" content="Add or Remove Thesis Tab">
    <meta name="keywords" content="Thesis, Add Thesis, Remove Thesis">
    <meta name="author" content="Ian Arevalo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleforADD.css">

    <!-- JavaScript Area-->
    <script src="scripts.js"></script>
    <script src="sweetalert.min.js"></script>
</head>

    <body>
    
        <div class="container">
            <header>Add Thesis</header>

            <?php
            session_start();
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
            session_destroy();
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
                                <label>Department Name </label>
                                <input type="text" placeholder="Enter Department Name" required id="Th_Department" name="Th_Department" onkeyup="checkform()">
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
                                <label> Category </label>
                                <input type="text" placeholder="basta" required id="Th_Category" name="Th_Category" onkeyup="checkform()">
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
    </body>
</html>

