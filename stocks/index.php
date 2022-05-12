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
        <div class="container">
            <a href="update.php"> <button type="button" class="btn btn-success">Update Stocks</button>
            </a>

        </div>
        <br>
        <div class="container">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
            <style>
                .card {
                    background-color: #fff;
                    border-radius: 10px;
                    border: none;
                    position: relative;
                    margin-bottom: 30px;
                    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
                }

                .l-bg-cherry {
                    background: linear-gradient(to right, #493240, #f09) !important;
                    color: #fff;
                }

                .l-bg-blue-dark {
                    background: linear-gradient(to right, #373b44, #4286f4) !important;
                    color: #fff;
                }

                .l-bg-green-dark {
                    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
                    color: #fff;
                }

                .l-bg-orange-dark {
                    background: linear-gradient(to right, #a86008, #ffba56) !important;
                    color: #fff;
                }

                .card .card-statistic-3 .card-icon-large .fas,
                .card .card-statistic-3 .card-icon-large .far,
                .card .card-statistic-3 .card-icon-large .fab,
                .card .card-statistic-3 .card-icon-large .fal {
                    font-size: 110px;
                }

                .card .card-statistic-3 .card-icon {
                    text-align: center;
                    line-height: 50px;
                    margin-left: 15px;
                    color: #000;
                    position: absolute;
                    right: -5px;
                    top: 20px;
                    opacity: 0.1;
                }

                .l-bg-cyan {
                    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
                    color: #fff;
                }

                .l-bg-green {
                    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
                    color: #fff;
                }

                .l-bg-orange {
                    background: linear-gradient(to right, #f9900e, #ffba56) !important;
                    color: #fff;
                }

                .l-bg-cyan {
                    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
                    color: #fff;
                }
            </style>

            <div class="col-md-10 ">
                <div class="row ">
                    <?php
                    $sql = "SELECT * FROM `pdt_categories`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card l-bg-cherry">
                                    <div class="card-statistic-3 p-4">
                                        <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0"><?php echo $row['name'] ?></h5>
                                        </div>
                                        <div class="row align-items-center mb-2 d-flex">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    3,243
                                                </h2>
                                            </div>
                                            <div class="col-4 text-right">
                                                <span>12.5% <i class="fa fa-arrow-up"></i></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    <?php

                        }
                    } else {
                        return 0;
                    } ?>

                </div>
            </div>
        </div>
    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>