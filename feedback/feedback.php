<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Form Reviews</title>
</head>
<body>

    <div class="wrapper">
        <h3>Tell us and rate your entire experience (1-5)</h3>
        <form id="reviewForm" action="#" method="post" onsubmit="event.preventDefault(); submitAlert();">
            <div class="rating">
                <input type="number" name="rating" hidden>
                <i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
            <div class="input-group">
				<select name="feedback" id="feedback" class="select">
					<optgroup label="Feedback Type">
						<option value="bug">Bug</option>
						<option value="comment">Comment</option>
						<option value="other">Others</option>
					</optgroup>
				</select>
            </div>
            <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
            <div class="btn-group">
                <button onclick="submitAlert()"  type="submit" class="btn submit">Submit</button>
                <button  onclick="cancelSubmission()" type="button"  class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>
	<script src="script.js"></script>

<?php
    include('../includes/footer.php');
?>
