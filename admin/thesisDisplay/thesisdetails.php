<?php
    define("GROOT","../");
    include('../auth.php');
    include("../config/dbconn.php");
    include("../includes/header.php");
    include("../includes/navbar.php");

    function getThesisDetails($conn, $code) {
        $code = mysqli_real_escape_string($conn, $code); // Sanitize the input
        $sql = "SELECT thesis.*, GROUP_CONCAT(thesis_author.Th_Author SEPARATOR ', ') as Authors
            FROM thesis 
            JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code
            WHERE thesis.Th_Code = '$code'
            GROUP BY thesis.Th_Code";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row;
    }

    if (isset($_GET["Th_Code"])) {
        $thesis = getThesisDetails($conn, $_GET["Th_Code"]);
    } else {
        $thesis = array(); // Initialize the $thesis variable to an empty array
    }
?>

<title><?php echo $thesis["Th_Title"]; ?></title>
<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <link rel="stylesheet" href="thesisdetailsstyle.css">
        <?php include('../includes/topbar.php');?>
        <div class="container">
            <div class="card">

                <a class="back-button" href="thesissearchsortandfilter.php">Go Back</a>
                <button class="reserve-button" id='reserve-link'>Reserve</button>
                <!-- <div>
                    <form method='POST' action='generate_pdf.php'>
                            <button type='submit' name='thesis' style='background-color: #ff574b; border: none; font-family: Montserrat; color: white; padding: 15px 32px; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;'>Export As PDF</button>
                    </form>
                </div> -->



                <!-- Display Thesis -->
                <h2><?php echo $thesis["Th_Title"]; ?></h2>
                <p>
                    <strong>Status:</strong> <?php echo $thesis["Th_ReservStatus"]; ?><br><br><br>
                    <strong>Code:</strong> <?php echo $thesis["Th_Code"]; ?><br><br><br>
                    <strong>Category:</strong> <?php echo $thesis["Th_Category"]; ?><br><br><br>
                    <strong>Thematic Area:</strong> <?php echo $thesis["Th_ThematicArea"]; ?><br><br><br>
                    <strong>Course:</strong> <?php echo $thesis["Th_Course"]; ?><br><br><br>
                    <strong>Department:</strong> <?php echo $thesis["Th_Department"]; ?><br><br><br>
                    <strong>Author:</strong> <?php echo $thesis["Authors"]; ?><br><br><br>
                    <strong>Advisor:</strong> <?php echo $thesis["Th_Advisor"]; ?><br><br><br>
                    <strong>Abstract:</strong> <?php echo $thesis["Th_Abstract"]; ?><br><br><br>
                    <strong>Date Modified:</strong> <?php echo $thesis["Th_DateModified"]; ?><br><br><br>
                </p>

             <!-- Alert Message after Submit -->
             <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
            ?>
                <script>
                    Swal.fire({
                        title: "<?php echo $_SESSION['status']; ?>",
                        icon: "success",
                        button: "OK!",
                    });
                </script>
            <?php
            unset($_SESSION['status']);
            }
            ?>
           

            <!-- this is PopUp Rservation -->
                <div class="popup-container">
                    <div class="popup-content">
                                <h3>Reservation Form </h3>
                                    <form action="reservation.php" method="POST" name="reservation-form">
                                        
                                        <input type="number" id="lownumber" value="1000" style="display: none;"/>
                                        <input type="number" id="highnumber" value="9999" style="display: none;" />
                                    
                                    <div class="data">
                                        <div id="randomnumber"><?php echo "Reservation ID:" ; ?></div>
                                    </div>
                                    
                                    <div class="data">Thesis Code: <?php echo $thesis["Th_Code"]; ?></div>
                                    <input type="hidden" name="Th_Code" value="<?php echo $thesis["Th_Code"];?>">

                                    <div class="data">
                                        <label>Name: <?php echo $_SESSION['user']['fname']." ". $_SESSION['user']['lname']?></label>
                                        <input type="hidden" id="User_Name" name="User_Name" value="<?php echo $_SESSION['user']['fname']." ". $_SESSION['user']['lname']?>"></label>
                                    </div>
                                    
                                    <div class="data">
                                        <label>Reserve Date:</label>
                                        <input type="date" required id="Reserv_Date" name="Reserv_Date">
                                    </div>
                                    
                                    <div class="data">
                                        <label>Return Date:</label>
                                        <input type="date" required id="Return_Date" name="Return_Date">
                                    </div>
                                    
                                    <div class="btn">
                                        <div class="inner"></div>
                                        <button type="submit" name="submit">RESERVE</button>
                                    </d>
                                        <button type="button" id="closeForm" class="close-btn">Close</button>
                                    </form>
                        </div>
                </div>
            
        </div>
    </div>
    <script src='thesispage.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reserveLink = document.getElementById("reserve-link");
            const popupContainer = document.querySelector(".popup-container");
            reserveLink.addEventListener("click", (event) => {
                // console.log("Reserve pressed");
                event.preventDefault();
                popupContainer.style.display = "block";
            });

            const closePopup = document.getElementById("closeForm");
            closePopup.addEventListener("click", (event) => {
                event.preventDefault();
                popupContainer.style.display = "none";
            });

            function goBack() {
                window.history.back();
            }
        });
    </script>   
<?php
    include('../includes/footer.php');
    include('../includes/scripts.php');
?>
<script>
    var active =document.getElementById("thesisLibrary");
    active.classList.add("active");
</script>