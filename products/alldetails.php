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
        $sql = "SELECT companies.name AS company_name, products.name as `name`,`pdt_id`,reg_date, pdt_categories.name As category, units.name AS unit ,unit_capacity,ppu,ppi FROM `products` LEFT JOIN `companies` ON products.company_id=companies.reg_id LEFT JOIN `pdt_categories` ON pdt_categories.id=products.category_id LEFT JOIN `units` ON units.id=products.unit_id WHERE `pdt_id`='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {  ?>
                <div class="container">
                    <a href="../products/">Back</a>
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
                                                    <dt>PRODUCT ID:</dt>
                                                    <dd><span class="label label-primary"><?php echo $row['pdt_id'] ?></span></dd>
                                                </dl>
                                                <dt>REG DATE:</dt>
                                                <dd><span class="label label-primary"><?php echo $row['reg_date'] ?></span></dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <dl class="dl-horizontal">
                                                    <dt>Company : <?php echo $row['company_name'] ?></dt>
                                                    <dt>Category: <?php echo $row['category'] ?></dt>
                                                    <dt>Unit: <?php echo $row['unit'] ?> </dt>
                                                    <dt>Unit Capacity: <?php echo $row['unit_capacity'] ?></dt>
                                                </dl>
                                            </div>
                                            <div class="col-lg-7" id="cluster_info">
                                                <dl class="dl-horizontal">
                                                    <dt>Price Per Unit : Rs.<?php echo $row['ppu'] ?></dt>
                                                    <dt>Price Per Item : Rs.<?php echo $row['ppi'] ?></dt>
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