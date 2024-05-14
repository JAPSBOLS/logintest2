<?php
include '../admin/auth.php';
?>
<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Personal Info</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <?php
                                if(isset($_SESSION['auth_role'])) {
                                    if($_SESSION['auth_role'] == 'student') {
                                        $logo = 'studentLOGO.png';
                                    } elseif($_SESSION['auth_role'] == 'admin') {
                                        $logo = 'adminLOGO.png';
                                    } 
                                } 
                                ?>
                                <img src="../images/<?php echo $logo; ?>" alt="Profile Logo"
                                    class="img-profile rounded-circle" style="width: 100px; height: 100px;">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <?php if ($_SESSION['auth_role'] !== 'admin'): ?>
                                    <div class="form-group">
                                        <label class="form-label">Student Number</label>
                                        <input type="text" class="form-control mb-1" value="<?php echo $_SESSION['user']['username']; ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="<?php
                                    echo $_SESSION['user']['username'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="<?php
                                    echo $_SESSION['user']['fname'].' '.$_SESSION['user']['MI'].'. '.$_SESSION['user']['lname'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?php
                                    echo $_SESSION['user']['email'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control" value="<?php
                                    echo $_SESSION['user']['department'];
                                    ?>">
                                </div>
                                <?php if ($_SESSION['auth_role'] !== 'admin'): ?>
                                    <div class="form-group">
                                        <label class="form-label">Course</label>
                                        <input type="text" class="form-control mb-1" value="<?php echo $_SESSION['user']['course']; ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control" value="<?php
                                    echo $_SESSION['user']['password'];
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" value="<?php
                                    echo $_SESSION['user']['address'];
                                    ?>">
                                </div>
                            </div>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="text" class="form-control" value="<?php
                                    echo $_SESSION['user']['dob'];
                                    ?>">
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts:</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="<?php
                                    echo $_SESSION['user']['phoneNum'];
                                    ?>">
                                </div>
                            </div>
                        </div>
 
        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default"   onclick="redirectToIndex()">Cancel</button>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>

    <script>
    function redirectToIndex() {
        window.location.href = ' ../admin/';
    }
    </script>
</body>

</html>