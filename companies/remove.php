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
            <a href="../companies/">Back</a>
            <hr>
            <?php
            include '../conn/db.php';
            $id = $_GET['id'];
            $sql = "DELETE FROM `companies` WHERE `reg_id`='$id'";
            if ($conn->query($sql) === TRUE) {
                echo "Company ID: ".$id."<br> Removed Successfully !";
            }
            ?>
        </div>


    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>