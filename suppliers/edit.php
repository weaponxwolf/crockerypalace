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

    <main>
        <div class="page-section counter-section">
            <div class="container">
                <div class="row align-items-center text-center">

                </div>
            </div>
        </div>

        <h1 style="text-align: center;">Edit Supplier</h1>

        <p style="text-align: center;"><a href="../suppliers/alldetails.php?id=<?php $id = $_GET["id"];
                                                                                echo $id; ?>">Back</a></p>
        <?php

        $sql = "SELECT * FROM `suppliers` WHERE `supplier_id`='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container" style="font-size: smaller;">
                    <div class="row">
                        <div class="col">

                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input name="name" type="text" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter Supplier Name ...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="<?php echo $row['country'] ?>">Country</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">State</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="<?php echo $row['state'] ?>">State</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">City</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="<?php echo $row['city'] ?>">City</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea name="address" class="form-control" rows="3"><?php echo $row['address'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Second Address</label>
                                    <textarea name="address2" class="form-control" rows="3"><?php echo $row['address2'] ?></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Postal Code</label>
                                    <input name="postal_code" value="<?php echo $row['postal_code'] ?>" type="number" class="form-control" placeholder="Enter Postal Code ...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Phone No</label>
                                    <input name="phone" type="number" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Enter Phone Number ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">FAX</label>
                                    <input name="fax" type="text" value="<?php echo $row['fax'] ?>" class="form-control" placeholder="Enter FAX ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Website</label>
                                    <input name="url" type="text" value="<?php echo $row['url'] ?>" class="form-control" placeholder="Enter URL ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input name="email" type="email" value="<?php echo $row['email'] ?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email Address ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Companies Deal With </label>
                                    <textarea name="companiesdealwith" class="form-control" rows="3"><?php echo $row['companies_deal_with'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Notes</label>
                                    <textarea name="notes" class="form-control" rows="3"><?php echo $row['notes'] ?></textarea>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-outline-primary">Update Supplier Details</button>
                            </form>
                        </div>
                        <div class="col">
                            <?php

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                include_once '../class/Supplier.php';
                                if (isset($_POST['name'], $_POST['country'], $_POST['state'], $_POST['city'], $_POST['address'], $_POST['address2'], $_POST['postal_code'], $_POST['phone'], $_POST['fax'], $_POST['url'], $_POST['email']) == 'TRUE') {
                                    $isadded = UpdateSupplier($conn, $id, $_POST['name'], $_POST['country'], $_POST['state'], $_POST['city'], $_POST['address'], $_POST['address2'], $_POST['postal_code'], $_POST['phone'], $_POST['fax'], $_POST['url'], $_POST['email'], $_POST['companiesdealwith'], $_POST['notes']);
                                    if ($isadded) {
                            ?>
                                        <hr>
                                        <h3>Updated Supplier</h3>
                                        <ul class="list-group">
                                            <li class="list-group-item">Name : <?php echo $_POST['name']; ?> </li>
                                            <li class="list-group-item">Supplier ID : <?php echo $isadded; ?> </li>
                                            <li class="list-group-item">Address : <?php echo $_POST['address']; ?> </li>
                                            <li class="list-group-item">Website : <?php echo $_POST['url']; ?> </li>
                                            <li class="list-group-item">FAX : <?php echo $_POST['fax']; ?> </li>
                                        </ul>
                                        <hr>

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
        <?php

            }
        } ?>


    </main>
    <div style="margin-bottom: 10px;">

    </div>
    <?php include_once '../components/forchild/scripts.php'; ?>
    <script>
        $(document).ready(function() {
            $.get('../apis/select/selectall.php', {
                data: 'countries'
            }, function(data, status, xhr) {
                var countries = JSON.parse(data);
                countries.forEach(element => {
                    var mytext = '<option value="' + element.id + '">' + element.name + '</option>';
                    $('#country').append(mytext);
                });
            });
            $("#country").change(function() {
                $.get('../apis/select/selectall.php', {
                    data: 'states',
                    search: 'country_id',
                    value: this.value
                }, function(data, status, xhr) {
                    $('#state').html('');
                    var states = JSON.parse(data);
                    states.forEach(element => {
                        var mytext = `<option value="${element.id}"> ${element.name}</option>`;
                        $('#state').append(mytext);
                    });
                });
            });
            $("#state").change(function() {
                $.get('../apis/select/selectall.php', {
                    data: 'cities',
                    search: 'state_id',
                    value: this.value
                }, function(data, status, xhr) {
                    $('#city').html('');
                    var cities = JSON.parse(data);
                    cities.forEach(element => {
                        var mytext = `<option value="${element.id}"> ${element.name}</option>`;
                        $('#city').append(mytext);
                    });
                });
            });

        });
    </script>
    <div style="text-align: center;font-size:large">

    </div>
</body>

</html>