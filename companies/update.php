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

        <h1 style="text-align: center;">Update Company Details</h1>
        <p style="text-align: center;"><a href="alldetails.php?id=<?php $id = $_GET['id'];
                                                                    echo $id; ?>">Back</a></p>

        <?php

        $sql = "SELECT * FROM `companies` WHERE `reg_id`='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="container" style="font-size: smaller;">
                    <div class="row">
                        <div class="col">

                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Company Name </label>
                                    <input name="name" type="text" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter Company Name...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CIN No </label>
                                    <input name="cin" type="text" value="<?php echo $row['cin']; ?>" class="form-control" placeholder="Enter CIN...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Contact No </label>
                                    <input name="contactno" type="number" value="<?php echo $row['contact']; ?>" class="form-control" placeholder="Enter Contact No...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email </label>
                                    <input name="email" type="text" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter Company email...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Website </label>
                                    <input name="website" type="text" value="<?php echo $row['website']; ?>" class="form-control" placeholder="Enter Company website...">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="<?php echo $row['country']; ?>">Country</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">State</label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="<?php echo $row['state']; ?>">State</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">City</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="<?php echo $row['city']; ?>">City</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Office Address</label>
                                    <textarea name="address" class="form-control" rows="3"><?php echo $row['address']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">PIN Code</label>
                                    <input name="pincode" value="<?php echo $row['pincode']; ?>" type="number" class="form-control" placeholder="Enter PIN Code ...">
                                </div>


                                <hr>
                                <button type="submit" class="btn btn-outline-primary">Update Company</button>
                            </form>
                        </div>
                        <div class="col">
                            <?php

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                include_once '../class/Companies.php';
                                if (isset($_POST['name'], $_POST['cin'], $_POST['contactno'], $_POST['email'], $_POST['website'], $_POST['country'], $_POST['state'], $_POST['city'], $_POST['address'], $_POST['pincode']) == 'TRUE') {
                                    $isadded = UpdateCompany($conn, $id, $_POST['name'], $_POST['cin'], $_POST['contactno'], $_POST['email'], $_POST['website'], $_POST['state'], $_POST['country'], $_POST['city'], $_POST['address'], $_POST['pincode']);

                                    if ($isadded) {
                            ?>
                                        <hr>
                                        <h3>Updated Company Details</h3>
                                        <ul class="list-group">
                                            <li class="list-group-item">Name : <?php echo $_POST['name']; ?></li>
                                            <li class="list-group-item">CIN : <?php echo $_POST['cin']; ?></li>
                                            <li class="list-group-item">Reg Id : <?php echo $isadded ?> </li>
                                            <li class="list-group-item">Email : <?php echo $_POST['email']; ?> </li>
                                            <li class="list-group-item">Contact : <?php echo $_POST['contactno']; ?> </li>
                                            <li class="list-group-item">Country : <?php echo $_POST['country']; ?> </li>
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
        } else {
            return 0;
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