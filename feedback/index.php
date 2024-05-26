<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../images/websiteLOGO.png" type="image/png">
    <link href="style.css" rel='stylesheet'>
    <title>BUP - Thesis Library</title>
</head>
<body>

    
    <div class="wrapper">
        <button class="close-button" onclick="closeForm()">X</button>
        <div class="wrapper1">
            <img src="../images/FEEBVACK.png">
            
            <h3>We appreciate your Feedback.</h3>
            <h5>It help us further improve our system through your suggestion.</h5>
        </div>

        <form action="submit_feedback.php" method="POST" id="reviewForm" onsubmit="submitForm(event)">
            <div class="rating">
                <input type="number" id="rating" name="rating" hidden>
                <br><i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
             <select  id="subject_type" name="subject_type" class="dropdown">
                <option disabled>--Select Subject Type--</option>
                <option value="Other">Other</option>
                <option value="Comment">Comment</option>
                <option value="Bugs">Bugs</option>
            </select>

            <textarea name="user_review" id="user_review" cols="30" rows="5" placeholder="Your suggestion..."></textarea>
           
            <div class="btn-group">
                <button onclick="submitAlert()" type="submit" class="btn submit">Submit</button>
                <button  onclick="cancelSubmission()"  class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>

    <?php
        include('../includes/footer.php');
    ?>