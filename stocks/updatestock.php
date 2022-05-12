<?php

include_once '../conn/db.php';

$addorsub = $_POST['addorsub'];
$pdt_id = $_POST['pdt_id'];

$sql = "SELECT * FROM `stocks` WHERE `pdt_id`='$pdt_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if ((int)$addorsub < 0) {
        $sql2 = "UPDATE `stocks` SET units=units+$addorsub WHERE `pdt_id`='$pdt_id'";
        $result2 = $conn->query($sql2);
        if ($result2) {
            echo "REDUCED";
        }
    } else {
        $sql2 = "UPDATE `stocks` SET units=units+$addorsub WHERE `pdt_id`='$pdt_id'";
        $result2 = $conn->query($sql2);
        if ($result2) {
            echo "INCREASED";
        }
    }
} else {
    if ((int)$addorsub>0) {
        $sql2 = "INSERT INTO `stocks`( `pdt_id`, `units`) VALUES ('$pdt_id','$addorsub')";
        $result2 = $conn->query($sql2);
        if ($result2) {
            echo "NEW RECORD";
        }
    }
}

$sql3="INSERT INTO `stock_history`( `pdt_id`, `changes`) VALUES ('$pdt_id','$addorsub')";
$result3 = $conn->query($sql3);
if ($result) {
    echo "RECORD UPDATED";
}
