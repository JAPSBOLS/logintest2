<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="contacts.css"/>
        <link rel="icon" href="../images/websiteLOGO.png" type="image/png">
        <title>BUP Thesis Library</title>
    </head>
    <body>

    <?php
        define("GROOT","../");
        include('../includes/header.php');
        include("../includes/navbar.php");
    ?>

        <section class="contact" id="contact">
            <h1 class="heading"><span>Contact </span>Us</h1>
            <div class="row">
                <div class="image">
                    <img src="ctcs.png" alt="">
                </div>
                <form action="https://formsubmit.co/a4cee74016fcbd521883d8d05f8913a0" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="name" class="box">
                    <input type="email" name="email" placeholder="email" class="box">
                    <input type="tel" name="tel" placeholder="contact no." pattern="[0-9]{11}" class="box">
                    <textarea name="message" required class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                    <input type="hidden" name="_captcha" value="false">
                    <button type="submit" class="btn" onclick="openPopup()">Send Message</button>
                    <input type="hidden" name="_next" value="http://127.0.0.1:5500/contacts.html">
                </form>
                
            </div>
        </section>
        
        <div class="container">
            <div class="popup" id="popup">
                <img src="check.gif">
                <h2>Thank you!</h2>
                <p>Your message has been sent.</p>
                <button type="button" onclick="closePopup()">OK</button>
            </div>
        </div>

        <script>
            let popup = document.getElementById("popup");
            
            function openPopup(){
                popup.classList.add("open-popup");
            }
            function closePopup(){
                popup.classList.remove("open-popup");
            }
        </script>

    <script src="assets/js/main.js"></script>
    <script>
    var active =document.getElementById("ContactUS");
    active.classList.add("active");
  </script>

<?php
  include("../includes/footer.php");
?>