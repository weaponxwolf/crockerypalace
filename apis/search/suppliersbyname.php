<?php
require_once '../../conn/db.php';
$name = $_GET['data'] . "%";
$sql = "SELECT  `supplier_id`,email, suppliers.name AS `name`, states.name AS `state`, cities.name AS `city`, countries.name AS `country`  FROM `suppliers` LEFT JOIN `countries` ON countries.id=suppliers.country LEFT JOIN `states` ON states.id=suppliers.state LEFT JOIN `cities` ON cities.id=suppliers.city WHERE suppliers.name LIKE '$name'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
