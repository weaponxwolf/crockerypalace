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

            <h1>Employees</h1>
            <p><a href="addemployee.php">Add Employee</a></p>
            <input type="text" placeholder="Search.." id="searchemployee">
            <br> <br>
            <div style="max-height: 45vh;overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
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

            fetch('../apis/select/employees.php')
                .then(response => response.json())
                .then(data => {
                    s = 1;
                    data.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${s}</th>
                            <td>${element.first_name} ${element.last_name}</td>
                            <td>${element.role}</td>
                            <td>${element.email}</td>
                            <td><a href="alldetails.php?id=${element.username}"><Button onclick='fetchdetails(this)' style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                        s = s + 1;
                    });

                });
            $("#searchemployee").keyup(function() {
                $.get('../apis/Search/employeesbyname.php', {
                    employee_name: this.value
                }, function(data, status, xhr) {
                    $("#thetable").html('');
                    var d = JSON.parse(data);
                    s = 1;
                    d.forEach(element => {
                        $("#thetable").append(`<tr>
                            <th scope="row">${s}</th>
                            <td>${element.first_name} ${element.last_name}</td>
                            <td>${element.role}</td>
                            <td>${element.email}</td>
                            <td><a href="allddetails.php?id=e${element.username}"><Button onclick='fetchdetails(this)' style="font-size:smaller;" class="btn btn-primary">More</Button></a></td>
                        </tr>`);
                        s = s + 1;
                    });
                });
            })
        });
    </script>
</body>

</html>