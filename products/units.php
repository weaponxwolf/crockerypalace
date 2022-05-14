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

            <h1>Units</h1>
            <p>
                <a href="../products/">Back</a> |
                <a href="newunit.php">Add New</a>
            </p>
            <div style="max-height: 45vh;overflow-y:scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unit Name</th>
                            <th scope="col">DELETE</th>
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
        function deleteCat(params) {
            var id = params.id;
            var catid = id.split('_');
            var cateid = catid[1];
            $.get('deleteunit.php?id=' + cateid, function(data, status) {
                $("#row_" + data).css('display', 'none');
                console.log(data);
            });
        }
        $(document).ready(function() {
            fetch('../apis/select/selectall.php?data=units')
                .then(response => response.json())
                .then(data => {
                    data.forEach(element => {
                        $("#thetable").append(`<tr id='row_${element.id}'>
                            <th scope="row">${element.id}</th>
                            <td>${element.name}</td>
                            <td><Button id="delete_${element.id}" onclick="deleteCat(this)" style="font-size:smaller;" class="btn btn-danger">Delete</Button></td>
                        </tr>`);
                    });
                });
        });
    </script>
</body>

</html>