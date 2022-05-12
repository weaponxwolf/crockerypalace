<?php
require_once '../../conn/db.php';

$sql = "SELECT  `first_name`, `last_name`, `username`, `role`, `phone`, `email`, `qualification`, `address`, `privilege`, states.name AS `state`, cities.name AS `city`, countries.name AS `country`, `pincode` FROM `users` LEFT JOIN `countries` ON countries.id=users.country LEFT JOIN `states` ON states.id=users.state LEFT JOIN `cities` ON cities.id=users.city";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
