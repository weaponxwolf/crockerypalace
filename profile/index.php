<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once "../conn/db.php";
include_once "../components/forchild/head.php";
?>

<body>
    <div class="back-to-top"></div>
    <header>
        <?php
        include_once "../components/forchild/navbar.php";
        ?>
    </header>

    <main>
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>
    </main>

    <div>
        <?php
        $username = $_SESSION['username'];
        $sql = "SELECT username,first_name,last_name,qualification,`address`,cities.name AS city,countries.name AS country,states.name AS `state`,privilege,`role`,email,phone,pincode FROM `users`LEFT JOIN `states` ON users.state=states.id LEFT JOIN countries ON users.country=countries.id LEFT JOIN cities ON users.city=cities.id  WHERE `username`='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4><?php echo $row['first_name'] . " " . $row['last_name'] ?></h4>
                                                <p class="text-secondary mb-1"><?php echo $row['role'] ?></p>
                                                <p class="text-muted font-size-sm"><?php echo $row['privilege'] ?></p>
                                                <!-- <button class="btn btn-primary">Follow</button>
                                                <button class="btn btn-outline-primary">Message</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">username</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['username'] ?>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['email'] ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['phone'] ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $row['address'] . ", " . $row['city'] . ", " . $row['state'] . ", " . $row['country'] . ", " . $row['pincode']; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a class="btn btn-info" href="changepassword.php">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        <?php
            }
        }
        ?>


    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>