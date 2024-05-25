<?php
  session_start();
?>
<div class="container-fluid" style="padding-left: 0px; padding-right: 0px">
  <nav class="navbar navbar-expand-lg" style="background-color:ivory">
    <div class="container-fluid">
      <img src='<?php echo GROOT;?>images/BUPLOGO2.png' style="height: 75px; width:200px; object-fit:cover" class='mb-3'></img>
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" id="home" aria-current="page" href="<?php echo GROOT;?>index.php" style="margin-right: 30px;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="margin-right: 30px;">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="margin-right: 30px;">Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="aboutUS" href="<?php echo GROOT;?>OnePage/aboutUs.php" style="margin-right: 30px;">About Us</a>
          </li>
        <li class="nav-item">
          <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>
            <a class="btn btn-primary" href="<?php echo GROOT; ?>admin/index.php">Back to Dashboard</a>
          <?php else: ?>
            <a class="btn btn-primary" href="<?php echo GROOT; ?>Login/newlogin.php">Login</a>
          <?php endif; ?>
        </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
