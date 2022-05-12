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
    <div class="container">
        <h1>Hello, <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></h1>
        <p><?php echo $_SESSION['role'] . ", " . $_SESSION['username'] . ", " . $_SESSION['privilege'] ?></p>
    </div>
    <div class="container">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
        <style>
            .home-card:hover {
                background-color: rgba(46, 42, 52, 0.078);
                cursor: pointer;
            }
            a:link{
                text-decoration: none;
            }
        </style>

        <div class="col-md-10 ">
            <div class="row ">
                <div class="col-xl-3 col-lg-6 "><a href="../sell/">
                        <div class="card l-bg-cherry home-card text-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                <div class="mb-4">
                                    <h1 class="card-title mb-0 text-dark">Sell </h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6"><a href="../orders/">
                        <div class="card l-bg-blue-dark home-card text-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                                <div class="mb-4">
                                    <h1 class="card-title mb-0 text-dark">Orders</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-6"> <a href="../stocks/">
                        <div class="card l-bg-green-dark home-card text-dark">
                            <div class="card-statistic-3 p-4" id="stocksinside">
                                <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                                <div class="mb-4">
                                    <h1 class="card-title mb-0 text-dark">Stocks</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>

</body>

</html>