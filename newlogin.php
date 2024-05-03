<?php 
    session_start();
    include('admin/config/dbconn.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="NEWstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>NEW Login Page</title>
</head>
<body>
    <div class="container" id="container">
        <img src="images/BUP2.png" alt="BUP Logo" class="logo">
        <div class="form-container sign-in">
            <form action="php/login_code.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
                <img src="images/studentLOGO.png" id="userLogo" class="guestLOGO">
                <div class="input-group">
                    <select name="role" id="user" class="select">
                        <option value="Student">Student</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <input type ="text" name="studNum" placeholder="Student Number">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login_btn">Log In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1 class="heading">THESIS <br> BOOK <br>RECORD</h1> 
                </div>
            </div>
        </div>
    </div>

    <script src="NEWloginscript.js"></script>
</body>

</html>