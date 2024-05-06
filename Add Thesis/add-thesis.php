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
    <script src="https://kit.fontawesome.com/801e66854f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <header>Add Thesis</header>
        <hr>
        <form action="add.php" method="POST" name="thesis-form">
            <div class="form">
                <div class="details">
                    <span class="title">INFORMATION FORM</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Thesis Title </label>
                            <input type="text" placeholder="Enter Thesis Title" required id="thesis_Title" name="thesis_Title" onkeyup="checkform()">
                        </div>
                        <div class="input-field">
                            <label>Author Name: </label>
                            <input type="text" placeholder="Enter Author Name" required id="author_Name" name="author_Name" onkeyup="checkform()">
                        </div>
                        <div class="input-field">
                            <label>Date Published </label>
                            <input type="date" placeholder="Enter Date" required id="date_Published" name="date_Published" onkeyup="checkform()">
                        </div>
                        <div class="input-field">
                            <label>Department Name </label>
                            <input type="text" placeholder="Enter Department Name" required id="department_Name" name="department_Name" onkeyup="checkform()">
                        </div>
                        <div class="input-field">
                            <label>Indicators </label>
                            <input type="text" placeholder="'Computer', 'AI', 'Basta'" required id="indicators" name="indicators" onkeyup="checkform()">
                        </div>
                        <div class="input-field">
                            <label>Keywords </label>
                            <input type="text" placeholder="'Computer', 'AI', 'Basta'" required id="keywords" name="keywords" onkeyup="checkform()">
                        </div>
                    </div>
                    <div class="abstractField">
                        <div class="abstract-field">
                            <label>Abstract </label>
                            <textarea type="text" placeholder="" required id="abstract" name="abstract" onkeyup="checkform()"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" id="formButton" class="button" name="submit" disabled="disabled">SUBMIT</button>
        </form>

        <!-- JavaScript Area-->
        <script>

            // Check form on keyup jajafaf
            function checkform() {
                var inputs = document.querySelectorAll(".input-field input, #abstract");
                var isValid = Array.from(inputs).every(input => input.value.trim() !== "");
                document.getElementById("formButton").disabled = !isValid;
            }

            // Show Submit Notificationntanginaiasa
            function showSubmitNotif() {
                Swal.fire({
                    title: "Good job!",
                    text: "Thesis submitted successfully!",
                    icon: "success"
                });
            }

            // Event Listeners
            document.addEventListener("DOMContentLoaded", function () {
                checkform();
                document.querySelectorAll(".input-field input, #abstract").forEach(input => {
                    input.addEventListener("keyup", checkform);
                });
            });

            // Form Submit
            document.querySelector("form[name='thesis-form']").addEventListener("submit", function () {
                showSubmitNotif(); // Success Notification 
            });
        </script>

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
    </div>
</body>
</html>
