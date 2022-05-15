<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include "components/head.php"; ?>

<body>

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
                        <h1 class="mb-4">Great Companies are built on great Products</h1>
                        <p class="text-lg mb-5">Ignite the most powerfull growth engine you have ever built for your company</p>
                        <a href="login.php" class="btn btn-primary btn-split ml-2">Log In <div class="fab"><span class="mai-play"></span></div></a>
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
    <?php include "components/scripts.php"; ?>
</body>
</html>