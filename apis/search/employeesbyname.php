
<?php
require_once '../../conn/db.php';

$name = $_GET['employee_name'] . '%';

$sql = "SELECT  `first_name`, `last_name`, `username`, `role`, `phone`, `email`, `qualification`, `address`, `privilege`, `city`, `state`, `country`, `pincode` FROM `users` WHERE `first_name` LIKE '$name'";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
$x = json_encode($emparray);
echo $x;
?>
