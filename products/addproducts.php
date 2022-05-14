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

        <h1 style="text-align: center;">Add Product</h1>
        <p style="text-align: center;"><a href="../products/">List Products</a></p>

        <div class="container" style="font-size: smaller;">
            <div class="row">
                <div class="col">

                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Product Name </label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Product Name...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Company Name <span style="font-weight: bold;" id="comp_name"></span></label>
                            <input name="company" type="text" id="entercompany" class="form-control" placeholder="Enter Company...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Category Name <span style="font-weight: bold;" id="category_name"></span></label>
                            <input name="category" id="entercategory" type="text" class="form-control" placeholder="Enter Category...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit Name <span style="font-weight: bold;" id="unit_name"></span> </label>
                            <input name="unit" id="enterunit" type="text" class="form-control" placeholder="Enter Unit Name...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. Of Items Per Unit </label>
                            <input name="unitcapacity" type="text" class="form-control" placeholder="Enter Unit Capacity...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Price per Unit </label>
                            <input name="ppu" type="text" class="form-control" placeholder="Enter PPU...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Price Per Item </label>
                            <input name="ppi" type="text" class="form-control" placeholder="Enter PPI...">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-primary">Add Procduct</button>
                    </form>
                </div>
                <div class="col">
                    <div id="optionlist">

                    </div>
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        include_once '../class/Products.php';
                        if (isset($_POST['name'], $_POST['company'], $_POST['category'], $_POST['unit'], $_POST['unitcapacity'], $_POST['ppu'], $_POST['ppi']) == 'TRUE') {
                            $isadded = AddProduct($conn, $_POST['name'], $_POST['company'], $_POST['category'], $_POST['unit'], $_POST['unitcapacity'], $_POST['ppu'], $_POST['ppi']);

                            if ($isadded) {
                    ?>
                                <hr>
                                <h3>Added Product</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">Name : <?php echo $_POST['name']; ?></li>
                                    <li class="list-group-item">PDT_ID : <?php echo $isadded ?> </li>
                                    <li class="list-group-item">Company: <?php echo $_POST['company']; ?> </li>
                                    <li class="list-group-item">Category : <?php echo $_POST['category']; ?> </li>
                                </ul>
                                <hr>
                                <a href="addproducts.php"><button class="btn btn-outline-primary">Add More</button></a>
                    <?php
                            }
                        } else {
                            echo "Please Fill The Form Correctly !";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>
    <div style="margin-bottom: 10px;">

    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>
    <script>
        function enterComp(params) {
            $("#entercompany").val(params.id);
            $("#comp_name").html(": " + params.innerHTML);
        }

        function enterCat(params) {
            $("#entercategory").val(params.id);
            $("#category_name").html(": " + params.innerHTML);
        }

        function enterUnit(params){
            $("#enterunit").val(params.id);
            $("#unit_name").html(": "+params.innerHTML);
        }
        $(document).ready(function() {
            $("#entercompany").keyup(function() {
                $.get('../apis/search/searchall.php', {
                    data: 'companies',
                    search: 'name',
                    value: this.value
                }, function(data, status, xhr) {
                    $("#optionlist").html('');
                    text = 'Choose One Company Below';
                    $("#optionlist").append(text);
                    var dataObj = JSON.parse(data);
                    dataObj.forEach(element => {
                        text = ` <li id='${element.reg_id}' onclick="enterComp(this)" class="list-group-item">${element.name}</li>`;
                        $("#optionlist").append(text);
                    });
                });
            });
            $("#entercategory").keyup(function() {
                $.get('../apis/search/searchall.php', {
                    data: 'pdt_categories',
                    search: 'name',
                    value: this.value
                }, function(data, status, xhr) {
                    $("#optionlist").html('');
                    text = 'Choose One Category Below';
                    $("#optionlist").append(text);
                    var dataObj = JSON.parse(data);
                    dataObj.forEach(element => {
                        text = ` <li id='${element.id}' onclick="enterCat(this)" class="list-group-item">${element.name}</li>`;
                        $("#optionlist").append(text);
                    });
                });
            });
            $("#enterunit").keyup(function() {
                $.get('../apis/search/searchall.php', {
                    data: 'units',
                    search: 'name',
                    value: this.value
                }, function(data, status, xhr) {
                    $("#optionlist").html('');
                    text = 'Choose One Category Below';
                    $("#optionlist").append(text);
                    var dataObj = JSON.parse(data);
                    dataObj.forEach(element => {
                        text = ` <li id='${element.id}' onclick="enterUnit(this)" class="list-group-item">${element.name}</li>`;
                        $("#optionlist").append(text);
                    });
                });
            });

        });
    </script>
    <div style="text-align: center;font-size:large">

    </div>
</body>

</html>