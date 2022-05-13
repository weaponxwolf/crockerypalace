<?php

include_once '../conn/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM `pdt_categories` WHERE `id`=$id";
$result = $conn->query($sql);
if ($result) {
    echo $id;
}
