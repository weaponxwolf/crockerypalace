<?php session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
} ?>
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
        <a href="../home/">Back</a> |
        <a href="../sell/">New</a>
        <hr>
    </div>
    <div class="container">
        <table class="table table-striped">
            <tbody><?php
                    $sql = "SELECT * FROM `invoice` ORDER BY `sno` DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                        <tr>

                            <td><a href="../sell/invoice.php?invoiceno=<?php echo $row['invoiceno'] ?>">#<?php echo $row['invoiceno'] ?>
                                </a></td>
                            <td><?php echo $row['name'] ?>, <?php echo $row['address'] ?></td>
                            <td><?php echo $row['date'] ?></td>

                        </tr>
                <?php
                        }
                    } else {
                    }
                ?>

            </tbody>
        </table>
        <div class="list-group">



        </div>


    </div>
    </div>
    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>

</body>

</html>