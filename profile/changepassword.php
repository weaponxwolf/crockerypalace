<?php session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once "../conn/db.php";
include_once "../components/forchild/head.php";
?>
<style>

</style>

<body>
    <div class="back-to-top"></div>
    <header>
        <?php include_once "../components/forchild/navbar.php"; ?>
    </header>

    <main>
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>


        <div class="container" style="font-size: smaller;">
            <div>
                <a href="../profile/">Back</a>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <form action="" method="post">
                            <input name="newpassword" type="password" class="form-control" placeholder="New Password">
                            <br>
                            <input name="cnewpassword" type="password" class="form-control" placeholder="Confirm New Password">
                            <hr>
                            <button type="submit" class="btn btn-outline-primary">Update Password</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $newpassword = $_POST['newpassword'];
                $cnewpassword = $_POST['cnewpassword'];
                if ($newpassword == $cnewpassword) {
                    $username = $_SESSION['username'];
                    $hashpassword = password_hash($cnewpassword, PASSWORD_DEFAULT);
                    $sql = "UPDATE `users` SET `password`='$hashpassword' WHERE `username`='$username'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Updated Password";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Please Enter Same Password !";
                }
            }
            ?>
        </div>
    </main>
    <div style="text-align: center;font-size:large">

    </div>
</body>

</html>