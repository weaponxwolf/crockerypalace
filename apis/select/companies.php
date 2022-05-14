<?php
require_once '../../conn/db.php';

$sql = "SELECT  companies.reg_id AS `reg_id`,email, companies.name AS `name`, states.name AS `state`, cities.name AS `city`, countries.name AS `country`  FROM `companies` LEFT JOIN `countries` ON countries.id=companies.country LEFT JOIN `states` ON states.id=companies.state LEFT JOIN `cities` ON cities.id=companies.city";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
