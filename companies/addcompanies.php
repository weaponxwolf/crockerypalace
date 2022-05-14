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

        <h1 style="text-align: center;">Add Company</h1>
        <p style="text-align: center;"><a href="../companies/">List Companies</a></p>

        <div class="container" style="font-size: smaller;">
            <div class="row">
                <div class="col">

                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Company Name </label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Company Name...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact No </label>
                            <input name="contactno" type="number" class="form-control" placeholder="Enter Contact No...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email </label>
                            <input name="email" type="text" class="form-control" placeholder="Enter Company email...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Website </label>
                            <input name="website" type="text" class="form-control" placeholder="Enter Company website...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Country</label>
                            <select name="country" id="country" class="form-control">
                                <option value="">Country</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">State</label>
                            <select name="state" id="state" class="form-control">
                                <option value="">State</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">City</label>
                            <select name="city" id="city" class="form-control">
                                <option value="">City</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Office Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">PIN Code</label>
                            <input name="pincode" type="number" class="form-control" placeholder="Enter PIN Code ...">
                        </div>


                        <hr>
                        <button type="submit" class="btn btn-outline-primary">Add Company</button>
                    </form>
                </div>
                <div class="col">
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        include_once '../class/Companies.php';
                        if (isset($_POST['name'], $_POST['country'], $_POST['state'], $_POST['city'], $_POST['address']) == 'TRUE') {
                            $isadded = AddCompany($conn, $_POST['name'], $_POST['contactno'], $_POST['email'], $_POST['website'], $_POST['state'], $_POST['country'], $_POST['city'], $_POST['address'], $_POST['pincode']);

                            if ($isadded) {
                    ?>
                                <hr>
                                <h3>Added Company</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">Name : <?php echo $_POST['name']; ?></li>
                                    <li class="list-group-item">Reg Id : <?php echo $isadded ?> </li>
                                </ul>
                                <hr>
                                <a href="adduser.php"><button class="btn btn-outline-primary">Add More</button></a>
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