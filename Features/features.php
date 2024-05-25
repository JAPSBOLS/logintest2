<?php
    define("GROOT","../");
    include('../includes/header.php');
    include("../includes/navbar.php");
  ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="features.css"/>
    </head>
    <body>
        <section class="features" id="features">
            <div class="content">
                <h3>Thesis Library</h3>
                <span>Management System</span>
                <p>Bicol University Polangui Online Thesis Library in One Management System </p>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <h1 class="heading"><span>User </span>Features</h1>
            <div class="row">
                <div class="video-container">
                    <video src="1.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>User Log-in</h3>
                    <p>Secure log-in access account based on role</p>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="content">
                    <h3>User Dashboard</h3>
                    <p>View user dashboard</p>
                </div>
                <div class="video-container">
                    <video src="2.mp4" loop autoplay muted></video>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="video-container">
                    <video src="3.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>Thesis search and sort</h3>
                    <p>View how search and sort works.</p>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="content">
                    <h3>User Filter</h3>
                    <p>Observe the functioning of the filter, which examines whether a thesis is available or unavailable, and then proceeds to filter the theses based on their department.</p>
                </div>
                <div class="video-container">
                    <video src="4.mp4" loop autoplay muted></video>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="video-container">
                    <video src="5.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>User Reservation</h3>
                    <p>Observe the process of reserving a thesis.</p>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <h1 class="heading"><span>Administrative </span>Features</h1>
            <div class="row">
                <div class="content">
                    <h3>Administrative Log-in</h3>
                    <p>Observe how admins log-in to the system.</p>
                </div>
                <div class="video-container">
                    <video src="login.mp4" loop autoplay muted></video>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="video-container">
                    <video src="dashboard.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>Administrative Dashboard</h3>
                    <p>Take a look at the distinct features of the admin dashboard and how it differs from the user dashboard.</p>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="content">
                    <h3>Remove Thesis</h3>
                    <p>Observe how admins remove thesis from the system.</p>
                </div>
                <div class="video-container">
                    <video src="REMOVE.mp4" loop autoplay muted></video>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="video-container">
                    <video src="ADD.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>Add Thesis</h3>
                    <p>Observe how admins add a theis into the system.</p>
                </div>
            </div>
        </section>

        <section class="feature0" id="feature0">
            <div class="row">
                <div class="content">
                    <h3>Thesis Library</h3>
                    <p>Discover the functionality of the thesis library feature and understand its operation.</p>
                </div>
                <div class="video-container">
                    <video src="THESIS LIB.mp4" loop autoplay muted></video>
                </div>
            </div>
        </section>

        
        <section class="feature0" id="feature0">
            <div class="row">
                <div class="video-container">
                    <video src="RESERVE.mp4" loop autoplay muted></video>
                </div>
                <div class="content">
                    <h3>Accept Reserve Thesis</h3>
                    <p>Take a closer look at how administrators process and approve pending requests to receive theses, and observe how these theses are added to the reservation list once reserved.</p>
                </div>
            </div>
        </section>

  <script src="assets/js/main.js"></script>
  <script>
    var active =document.getElementById("features");
    active.classList.add("active");
  </script>

<?php
  include("../includes/footer.php");
?>