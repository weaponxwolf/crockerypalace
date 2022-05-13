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
            <h1>Update Stocks</h1>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <form id="custom-search-form" class="form-search form-horizontal pull-right">
                            <div class="input-append span12">
                                <input id="enterproduct" type="text" class="search-query" placeholder="Search">
                                <button type="submit" class="btn"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">PDT ID</th>
                        <th scope="col">PRODUCT</th>
                        <th scope="col">COMPANY</th>
                        <th scope="col">STOCKS</th>
                        <th scope="col">(+) OR (-) UNITS</th>
                        <th scope="col">UPDATE</th>
                    </tr>
                </thead>

                <tbody id="thetable">
                    <?php

                    $sql = "SELECT units.name AS unit_name, units,products.pdt_id AS product_id, products.name AS product_name, companies.name AS company_name FROM `products` LEFT JOIN `stocks` ON products.pdt_id=stocks.pdt_id LEFT JOIN `companies` ON companies.reg_id=products.company_id LEFT JOIN `units` ON units.id=products.unit_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row"><?php echo $row['product_id'] ?></th>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['company_name'] ?></td>
                                <td><span id="units_<?php echo $row['product_id']; ?>"><?php echo $row['units'] ?> </span> <?php echo $row['unit_name'] ?></td>
                                <td>
                                    <input type="number" name="aors" id="aors_<?php echo $row['product_id']; ?>">
                                </td>
                                <td id="updatestatus_<?php echo $row['product_id'] ?>">
                                    <button type="button" onclick="updatestock(this)" id="update_<?php echo $row['product_id'] ?>" class="btn btn-success">Update</button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        return 0;
                    } ?>


                </tbody>
            </table>
        </div>
    </main>
    <?php include_once '../components/forchild/scripts.php'; ?>
    <script>
        function redo(params) {
            const myArray = params.id.split("_");
            $("#aors_" + myArray[1]).val(0);
            $("#updatestatus_" + myArray[1]).html(`<td id="updatestatus_${myArray[1]}">
                                    <button type="button" onclick="updatestock(this)" id="update_${myArray[1]}" class="btn btn-success">Update</button>
                                </td> `);
        }

        function updatestock(params) {
            const myArray = params.id.split("_");
            var addorsubunit = $("#aors_" + myArray[1]).val();
            $.post("updatestock.php", {
                    pdt_id: myArray[1],
                    addorsub: addorsubunit
                },
                function(data, status) {

                    $("#aors_" + myArray[1]).val(0);
                    var currval = parseFloat($("#units_" + myArray[1]).html());
                    var updated = currval + parseFloat(addorsubunit);
                    if (updated <= 0) {
                        $("#units_" + myArray[1]).html(0);
                    } else
                        $("#units_" + myArray[1]).html(updated);
                    $("#updatestatus_" + myArray[1]).html(`UPDATED  `);
                    $("#updatestatus_" + myArray[1]).append(`<button type="button" onclick="redo(this)" id="redo_${myArray[1]}" class="btn btn-info">Redo</button>`);
                });
        }
        $(document).ready(function() {
            $("#enterproduct").keyup(function() {
                var s = this.value;
                $.get('../apis/search/productsbyname.php?data=' + s, function(data, status) {
                    var products = JSON.parse(data);
                    $("#thetable").html('');
                    products.forEach(element => {
                        $("#thetable").append(`
                        <tr>
                                <th scope="row">${element.product_id}</th>
                                <td>${element.pdt_name}</td>
                                <td>${element.company_name}</td>
                                <td><span id="units_${element.product_id}">${element.stockvalue} </span> ${element.unit_name}</td>
                                <td>
                                    <input type="text" name="aors" id="aors_${element.product_id}">
                                </td>
                                <td id="updatestatus_${element.product_id}">
                                    <button type="button" onclick="updatestock(this)" id="update_${element.product_id}" class="btn btn-success">Update</button>
                                </td>
                            </tr>`);
                    });
                });
            });
        });
    </script>
</body>

</html>