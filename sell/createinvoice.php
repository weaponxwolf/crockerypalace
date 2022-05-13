<?php

include_once '../conn/db.php';

$nameaddress = $_POST['nameadd'];
$contact = $_POST['contact'];
$total = $_POST['totalamt'];
$discount = $_POST['discount'];
$tax = $_POST['charges'];
$finalamt = $_POST['finalamt'];
$pdtsandquant = "";

foreach ($_POST['products'] as $key => $value) {
    $pdtsandquant = $pdtsandquant . "," . $value['id'] . "-" . $value['quantity'] . "@" . $value['subtotal'];
}
$invoiceno = date("ymdhis");

$sql = "INSERT INTO `invoice`( `invoiceno`, `nameaddress`,`contactno`, `boughtpdts`, `total`, `discount`, `tax`, `finalamt`) VALUES ('$invoiceno','$nameaddress','$contact','$pdtsandquant','$total','$discount','$tax','$finalamt')";
$result = $conn->query($sql);
if ($result) {
    echo $invoiceno;
}

foreach ($_POST['products'] as $key => $value) {
    $productid = $value['id'];
    $pdt_id = trim($productid, "#");
    $productquantity = (float)$value['quantity'];
    $sql2 = "SELECT * FROM `stocks` LEFT JOIN `products` ON products.pdt_id=stocks.pdt_id WHERE stocks.pdt_id='$pdt_id' ";
    $result2 = $conn->query(($sql2));
    if ($result2) {
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_array($result2)) {
                $unitcapacity = (float)$row2['unit_capacity'];
                $subtract = $productquantity / $unitcapacity;
                if ($subtract <= $row2['units']) {
                    $sql3 = "UPDATE `stocks` SET units=units-$subtract WHERE `pdt_id`='$pdt_id'";
                    $result3 = $conn->query($sql3);
                    if ($result3) {
                    }
                }
            }
        }
    }
}
