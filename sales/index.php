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
        <h1>Sales History</h1>
    </div>
    <div class="container">
        <div class="list-group">
            <?php
            $sql = "SELECT * FROM `invoice`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <a href="../sell/invoice.php?invoiceno=<?php echo $row['invoiceno'] ?>" class="list-group-item list-group-item-action col"><?php echo "#" . $row['invoiceno'] . "- " . $row['nameaddress'] ?></a>
            <?php
                }
            } else {
            }
            ?>


        </div>


    </div>
    </div>
    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>

</body>

</html>