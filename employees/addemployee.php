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

        <h1 style="text-align: center;">Add Employee</h1>

        <p style="text-align: center;"><a href="../employees/">List Employees</a></p>

        <div class="container" style="font-size: smaller;">
            <div class="row">
                <div class="col">

                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input name="first_name" type="text" class="form-control" placeholder="Enter First name ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Last Name</label>
                            <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">email</label>
                            <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email address ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Phone No</label>
                            <input name="phone_number" type="number" class="form-control" placeholder="Enter Phone Number ...">
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
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea name="address" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Qualification</label>
                            <textarea name="qualification" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">PIN Code</label>
                            <input name="pincode" type="number" class="form-control" placeholder="Enter PIN Code ...">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Privilege Level</label>
                            <select class="form-control" name="privilege">
                                <option>admin</option>
                                <option>employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Role</label>
                            <select name="role" class="form-control">
                                <?php
                                $sql = "SELECT * FROM `roles`";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <option><?php echo $row['role_name'] ?></option>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-primary">Add Employee</button>
                    </form>
                </div>
                <div class="col">
                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        include_once '../class/User.php';
                        if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['phone_number'], $_POST['qualification'], $_POST['privilege'], $_POST['role'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['pincode']) == 'TRUE') {
                            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $isadded = AddUser($conn, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $password, $_POST['phone_number'], $_POST['qualification'], $_POST['privilege'], $_POST['role'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['pincode']);
                            if ($isadded == 1) {
                    ?>
                                <hr>
                                <h3>Added Employee</h3>
                                <ul class="list-group">
                                    <li class="list-group-item">Name : <?php echo $_POST['first_name']; ?> <?php echo $_POST['last_name']; ?></li>
                                    <li class="list-group-item">Phone : <?php echo $_POST['phone_number']; ?> </li>
                                    <li class="list-group-item">Email : <?php echo $_POST['email']; ?> </li>
                                    <li class="list-group-item">Role : <?php echo $_POST['role']; ?> </li>
                                    <li class="list-group-item">Privilege : <?php echo $_POST['privilege']; ?> </li>
                                </ul>
                                <hr>
                                <a href="addemployee.php"><button class="btn btn-outline-primary">Add More</button></a>
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