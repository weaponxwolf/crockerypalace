<?php session_start();
if (isset($_SESSION['username'])) {
    header('Location: home/');
} ?>
<!DOCTYPE html>
<html lang="en">
<?php
include "components/head.php";
include "conn/db.php";
?>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light navbar-float">
            <div class="container">
                <a href="index.php" class="navbar-brand">Crockery<span class="text-primary">Palace</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="page-banner home-banner">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <form method="POST" action="login.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            include 'class/LogIn.php';
                            if (LogIn($conn, $_POST['username'], $_POST['password']) == 1) {
                                if (RegisterLogin($conn, $_POST['username']) == 1) {

                                    $username = $_POST['username'];
                                    $sql = "SELECT * FROM `users` WHERE `username`='$username'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $_SESSION['username'] = $username;
                                            $_SESSION['first_name'] = $row['first_name'];
                                            $_SESSION['last_name'] = $row['last_name'];
                                            $_SESSION['role'] = $row['role'];
                                            $_SESSION['privilege'] = $row['privilege'];
                                        }
                                    }
                                    echo $_SESSION['role'];
                                    header('Location: home/');
                                }
                            } else {
                                echo "Invalid Credentials";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-6 py-3 wow zoomIn">
                        <div class="img-place">
                            <img src="assets/img/bg_image_1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php include_once 'components/scripts.php'; ?>

</body>

</html>