<?php
session_start();
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
        $sql = "SELECT * FROM `suppliers` WHERE `supplier_id`='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
                    <div class="container">
                        <a href="../suppliers/">Back</a>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="project-info-box mt-0">
                                    <hr>
                                    <h1><?php echo $row['name'] ?></h1>
                                    <p>Supplier ID: <?php echo $row['supplier_id'] ?></p>
                                    <p><b>Registration Date : </b><?php echo $row['registration_date'] ?></p>
                                    <hr>
                                    <div style="text-align: center;">
                                        <p class="mb-0"><?php echo $row['address'] ?></p>
                                        <p class="mb-0"><?php echo $row['address2'] ?></p>
                                    </div>

                                    <br>
                                </div>
                                <hr>
                                <div class="project-info-box" style="font-style:italic;font-weight:bold">

                                    City : <?php echo $row['city'] ?>
                                    <br>
                                    State : <?php echo $row['state'] ?>
                                    <br>
                                    Country : <?php echo $row['state'] ?>
                                    <br>
                                    Postal Code : <?php echo $row['postal_code'] ?>
                                    <hr>
                                    Phone : <?php echo $row['postal_code'] ?>
                                    <br>
                                    FAX : <?php echo $row['postal_code'] ?>
                                    <br>
                                    Email : <?php echo $row['postal_code'] ?>
                                    <hr>

                                </div>


                            </div><!-- / column -->

                            <div class="col-md-7">
                                <img src="../assets/img/default-supplier.png" style="max-height: 50vh;max-width:50vh" alt="project-image" class="rounded">
                                <div class="project-info-box">
                                    <p><b>Website : </b><?php echo $row['url'] ?></p>
                                    <p><b>Companies Deal With : </b><?php echo $row['url'] ?></p>
                                    <p><b>Extra Notes : </b><?php echo $row['url'] ?></p>

                                    <a href="remove.php?id=<?php echo $row['supplier_id']; ?>"> <button type="button" class="btn btn-danger">Remove</button></a> |
                                    <a href="edit.php?id=<?php echo $row['supplier_id']; ?>"><button type="button" class="btn btn-dark">Edit</button></a>
                                </div><!-- / project-info-box -->
                            </div><!-- / column -->
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