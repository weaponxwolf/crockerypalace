<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once "../conn/db.php";
include_once '../components/forchild/head.php';
?>

<body>

    <!-- Back to top button -->
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

        <h1 style="text-align: center;">Add New Unit</h1>
        <p style="text-align: center;"><a href="units.php">List Units</a></p>

        <div class="container" style="font-size: smaller;">
            <div class="row">
                <div class="col">

                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit Name </label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Unit Name...">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Add Category</button>
                    </form>
                    <hr>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $name = $_POST['name'];
                        $sql = "SELECT * FROM `units` WHERE `name`='$name'";
                        $result = $conn->query($sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo "UNIT : '" . $name . "' already exists";
                            } else {
                                $sql2 = "INSERT INTO `units` (`name`) VALUES ('$name')";
                                $result2 = $conn->query($sql2);
                                if ($result2) {
                                    echo "UNIT : '" . $name . "' ADDED";
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>

    </main>
    <div style="margin-bottom: 10px;">

    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>

</body>

</html>