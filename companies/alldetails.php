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


        <?php
        $id = $_GET['id'];
        $sql = "SELECT companies.name AS `name`, reg_id, cin, contact,email,`address`,`pincode`,`website`,registration_date, cities.name AS city,countries.name AS country,states.name AS `state` FROM `companies`LEFT JOIN `states` ON companies.state=states.id LEFT JOIN countries ON companies.country=countries.id LEFT JOIN cities ON companies.city=cities.id  WHERE companies.reg_id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container">
                    <a href="../companies/">Back</a>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="wrapper wrapper-content animated fadeInUp">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="m-b-md">
                                                    <h1><?php echo $row['name'] ?></h1>
                                                </div>
                                                <dl class="dl-horizontal">
                                                    <dt>REG ID:</dt>
                                                    <dd><span class="label label-primary"><?php echo $row['reg_id'] ?></span></dd>
                                                </dl>
                                                <dt>REG DATE:</dt>
                                                <dd><span class="label label-primary"><?php echo $row['registration_date'] ?></span></dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <dl class="dl-horizontal">
                                                    <dt>CIN : <?php echo $row['cin'] ?></dt>
                                                    <dt>Contact: <?php echo $row['contact'] ?></dt>
                                                    <dt>Email: <?php echo $row['email'] ?> </dt>
                                                    <dt>Website: <?php echo $row['website'] ?></dt>
                                                </dl>
                                            </div>
                                            <div class="col-lg-7" id="cluster_info">
                                                <dl class="dl-horizontal">
                                                    <dt>City : <?php echo $row['city'] ?></dt>
                                                    <dt>State : <?php echo $row['state'] ?></dt>
                                                    <dt>Country : <?php echo $row['country'] ?> </dt>
                                                    <dt>Address : <?php echo $row['address'] ?></dt>
                                                    <dt>PIN CODE : <?php echo $row['pincode'] ?></dt>
                                                </dl>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div>
                                    <a href="remove.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-danger">Remove</button> </a>
                                   | <a href="update.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-dark">Update</button></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="wrapper wrapper-content project-manager">
                                <p class="small">
                                    <img src="../assets/img/default-supplier.png" style="max-height: 50vh;max-width:50vh" alt="project-image" class="rounded">
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

        <?php

            }
        } else {
            return 0;
        } ?>


    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>