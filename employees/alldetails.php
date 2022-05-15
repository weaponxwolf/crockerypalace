<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>
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

    <main style="font-size: smaller;">
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>
        <div class="container">
            <div style="text-align:center">
                <a href="../employees/">Back</a>
            </div>
        </div>
        <?php
        $userid = $_GET['id'];
        $sql = "SELECT username,gender,first_name,last_name,qualification,`address`,cities.name AS city,countries.name AS country,states.name AS `state`,privilege,`role`,email,phone,pincode FROM `users`LEFT JOIN `states` ON users.state=states.id LEFT JOIN countries ON users.country=countries.id LEFT JOIN cities ON users.city=cities.id  WHERE `username`='$userid' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="container mt-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7">
                            <div class="card p-3 py-4">
                                <div class="text-center">
                                    <?php
                                    $img = "";
                                    if ($row['gender'] == 'male') {
                                        $img = "../assets/img/boy.png";
                                    } else {
                                        $img = "../assets/img/girl.png";
                                    }
                                    ?>
                                    <img src="<?php echo $img; ?>" width="100" class="rounded-circle">
                                </div>
                                <div class="text-center mt-3">
                                    <?php
                                    if ($row['privilege'] == 'admin') { ?>
                                        <span class="bg-secondary p-1 px-4 rounded text-white">admin</span>
                                    <?php

                                    }
                                    ?>
                                    <h5 class="mt-2 mb-0"><?php echo $row['first_name'] . " " . $row['last_name'] ?> </h5>
                                    <span><?php echo $row['role'] ?></span>
                                    <div class="px-4 mt-1">
                                        <p class="fonts"><?php echo $row['qualification'] ?></p>
                                    </div>
                                    <hr>
                                    <div class="px-4 mt-1">
                                        <p class="fonts"><?php echo $row['address'] ?></p>
                                    </div>
                                    <div class="px-4 mt-1">
                                        <p class="fonts"><?php echo $row['city'] . " " . $row['state'] . " " . $row['country'] . " " . $row['pincode'] ?></p>
                                    </div>
                                    <div class="buttons">
                                        <button class="btn btn-outline-primary px-4">Message : <?php echo $row['email'] ?></button>
                                        <hr>
                                        <button class="btn btn-primary px-4 ms-3">Contact : <?php echo $row['phone'] ?></button>
                                        <hr>
                                        <?php if ($_SESSION['username'] != $row['username'] && $_SESSION['privilege'] == 'admin') { ?>
                                            <a href="remove.php?id=<?php echo $row['username'] ?>"><button type="button" class="btn btn-danger">Remove User</button></a>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            return 0;
        }
        ?>



    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>