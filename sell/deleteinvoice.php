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
            <a href="../sales/">Back</a>
            <hr>
            <?php
            include '../conn/db.php';
            $invoice_no = $_GET['invoiceno'];
            $sql = "DELETE FROM `invoice` WHERE `invoiceno`='$invoice_no'";
            if ($conn->query($sql) === TRUE) {
                echo "INVOICE :" . $invoice_no . "<br> Removed Successfully !";
            }
            ?>
        </div>


    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
</body>

</html>