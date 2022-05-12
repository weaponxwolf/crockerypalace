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

            <h1>Products</h1>
            <p><a href="addproducts.php">Add Products</a></p>
            <input type="text" placeholder="Search.." id="searchsupplier">
            <br> <br>
            <div style="max-height: 45vh;overflow-y:scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Company</th>
                            <th scope="col">Category</th>
                            <th scope="col">MORE</th>
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
            fetch('../apis/select/products.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${element.pdt_id}</th>
                            <td>${element.pdt_name}</td>
                            <td>${element.company_name}</td>
                            <td>${element.category}</td>
                            <td><a href="alldetails.php?id=${element.pdt_id}"><Button style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                    });
                });

            $("#searchsupplier").keyup(function() {
                $.get('../apis/search/productsbyname.php', {
                    data: this.value,
                }, function(data, status, xhr) {
                    $("#thetable").html('');
                    var d = JSON.parse(data);
                    d.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${element.pdt_id}</th>
                            <td>${element.pdt_name}</td>
                            <td>${element.company_name}</td>
                            <td>${element.category}</td>
                            <td><a href="alldetails.php?id=${element.pdt_id}"><Button style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                    });
                });
            });
        });
    </script>
</body>

</html>