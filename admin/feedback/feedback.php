<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="style.css" rel='stylesheet'>
    <title>Form Reviews</title>
</head>
<body>

    
    <div class="wrapper">
        <button class="close-button" onclick="closeForm()">X</button>
        <div class="wrapper1">
            <img src="../../images/FEEBVACK.png">
            
            <h3>We appreciate your Feedback.</h3>
            <h5>It help us further improve our system through your suggestion.</h5>
        </div>

        <form action="#" onsubmit="event.preventDefault(); submitAlert();">
            <div class="rating">
                <input type="number" name="rating" hidden>
                <br><i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
             <select name="dropdown" class="dropdown">
                <option value="option1">Other</option>
                <option value="option2">Comment</option>
                <option value="option3">Bugs</option>
            </select>

            <textarea name="opinion" cols="30" rows="5" placeholder="Your suggestion..."></textarea>
           
            <div class="btn-group">
                <button onclick="submitAlert()"  type="submit" class="btn submit">Submit</button>
                <button  onclick="cancelSubmission()" class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
    
<?php
    include('../includes/footer.php');
?>
