<?php
define("GROOT","../");
include(GROOT."auth.php");
include(GROOT."includes/header.php");
include(GROOT."includes/navbar.php");
?>
<title>User Reviews</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Font Awesome CDN for star icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include(GROOT.'includes/topbar.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User Reviews</h1>
            </div>

            <div class="container">
                <!-- Display Total Reviews, Ratings Count, and Ratio of Ratings -->
                <div class="card mb-3">
                    <div class="card-header">Reviews Overview</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 d-flex flex-column align-items-center">
                            <?php
                            // Start session and include database connection
                            include('../config/dbconn.php');

                            // SQL query to count total reviews
                            $total_reviews_sql = "SELECT COUNT(*) AS total_reviews FROM t_feedback";
                            $total_reviews_result = $conn->query($total_reviews_sql);
                            $total_reviews_row = $total_reviews_result->fetch_assoc();
                            $total_reviews = $total_reviews_row['total_reviews'];

                            echo "<p>Total Reviews: $total_reviews</p>";

                            // Calculate the ratio of ratings
                            $ratings_count_sql = "SELECT user_rating, COUNT(*) AS rating_count FROM t_feedback GROUP BY user_rating ORDER BY user_rating DESC";
                            $ratings_count_result = $conn->query($ratings_count_sql);

                            $total_stars = 0;
                            if ($ratings_count_result->num_rows > 0) {
                                while ($row = $ratings_count_result->fetch_assoc()) {
                                    $total_stars += $row['user_rating'] * $row['rating_count'];
                                }
                            }

                            if ($total_reviews > 0) {
                                $average_rating = $total_stars / $total_reviews;
                                echo "<p>Rating Ratio:</p>";
                                echo "<div class='rating-ratio'>";
                                echo "<span class='numerical-value'> (" . number_format($average_rating, 2) . "/5)</span>";
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $average_rating) {
                                        echo "<i class='fas fa-star orange-star'></i>";
                                    } else {
                                        echo "<i class='far fa-star'></i>";
                                    }
                                }
                                echo "</div>";
                            }
                            ?>

                            </div>
                            <div class="col-md-6">
                                <?php
                                // Initialize ratings array to ensure all ratings are represented
                                $ratings_count = [
                                    5 => 0,
                                    4 => 0,
                                    3 => 0,
                                    2 => 0,
                                    1 => 0
                                ];

                                // Fill the ratings array with the actual counts
                                $ratings_count_result = $conn->query($ratings_count_sql);
                                if ($ratings_count_result->num_rows > 0) {
                                    while ($row = $ratings_count_result->fetch_assoc()) {
                                        $ratings_count[$row['user_rating']] = $row['rating_count'];
                                    }
                                }

                                echo "<p>Ratings Count:</p>";
                                echo "<ul class='list-group'>";
                                foreach ($ratings_count as $rating => $rating_count) {
                                    echo "<li class='list-group-item'>{$rating} Star: ({$rating_count})";
                                    // Progress Bar
                                    echo "<div class='progress'>";
                                    echo "<div class='progress-bar bg-warning' role='progressbar' style='width: " . ($rating_count / $total_reviews * 100) . "%' aria-valuenow='" . ($rating_count / $total_reviews * 100) . "' aria-valuemin='0' aria-valuemax='100'></div>";
                                    echo "</div>";
                                    echo "</li>";
                                }
                                echo "</ul>";


                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Display Individual Reviews -->
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Start session and include database connection
                        include('../config/dbconn.php');

                        // SQL query to fetch feedback data along with user names
                        $sql = "SELECT t_feedback.*, t_users.username FROM t_feedback INNER JOIN t_users ON t_feedback.user_ID = t_users.userID";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='card mb-3'>";
                                echo "<div class='card-header'>" . $row["username"] . "</div>"; // User displayed first
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>Rating: ";
                                // Generate star rating based on user_rating value
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $row["user_rating"]) {
                                        echo "<i class='fas fa-star orange-star'></i>";
                                    } else {
                                        echo "<i class='far fa-star'></i>";
                                    }
                                }
                                echo "</h5>";
                                echo "<p class='card-text'>Subject Type: " . $row["feedback_type"] . "</p>"; // Feedback type displayed second
                                echo "<p class='card-text'>User Comment: " . $row["user_comment"] . "</p>";
                                echo "</div>";
                                echo "<div class='card-footer text-muted'>Date: " . $row["date"] . "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No reviews found.</p>";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include(GROOT.'includes/scripts.php');
?>
<script>
    const active = document.getElementById('Reviews');
    active.classList.add('active');
</script>
