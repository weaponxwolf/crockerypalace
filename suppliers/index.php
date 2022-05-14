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
        <?php
        include_once "../components/forchild/navbar.php";
        ?>
    </header>

    <main style="font-size: smaller;">
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="alldetails">
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
        </div>

        <div class="container" id="mainpart">

            <h1> Suppliers</h1>
            <p><a href="addsupplier.php">Add Suppliers</a></p>
            <input type="text" placeholder="Search.." id="searchsupplier">
            <br> <br>
            <div style="max-height: 45vh;overflow-y:scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">City</th>
                            <th scope="col">Email</th>
                            <th scope="col">More Details</th>
                        </tr>
                    </thead>
                    <tbody id="thetable">
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
    <script>
        $(document).ready(function() {

            fetch('../apis/select/suppliers.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${element.supplier_id}</th>
                            <td>${element.name}</td>
                            <td>${element.city}</td>
                            <td>${element.email}</td>
                            <td>
                            <a href="alldetails.php?id=${element.supplier_id}"><Button onclick='fetchdetails(this)' style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                    });

                });
            $("#searchsupplier").keyup(function() {
                $.get('../apis/search/suppliersbyname.php?data=' + this.value, function(data, status, xhr) {
                    $("#thetable").html('');
                    var d = JSON.parse(data);
                    d.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${element.supplier_id}</th>
                            <td>${element.name}</td>
                            <td>${element.city}</td>
                            <td>${element.email}</td>
                            <td>
                            <a href="alldetails.php?id=${element.supplier_id}"><Button onclick='fetchdetails(this)' style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                    });
                });
            });
        });
    </script>

</body>

</html>