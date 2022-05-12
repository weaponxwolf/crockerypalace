<?php
require_once '../../conn/db.php';
$name = $_GET['data'] . "%";
$sql = "SELECT products.pdt_id as product_id,products.name AS pdt_name ,companies.name AS `company_name` , pdt_categories.name AS category, stocks.units as stockvalue, units.name AS unit_name   FROM `products` LEFT JOIN `companies` ON companies.reg_id=products.company_id LEFT JOIN `pdt_categories` ON pdt_categories.id=products.category_id LEFT JOIN `units` ON units.id=products.unit_id LEFT JOIN `stocks` ON stocks.pdt_id=products.pdt_id WHERE products.name LIKE '$name'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
