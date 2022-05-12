<?php
function AddProduct($conn, $name, $company, $category, $unitname, $unitcapacity, $ppu, $ppi)
{
    $sno=0;
    $sql2="SELECT MAX(id) FROM `products`";
    $result=$conn->query($sql2);
    if ($result) {
        while ($rows=mysqli_fetch_array($result)) {
            $sno=$rows[0];
        }
    }
    $pdtid=(string)(((int)date('ymd')*10000)+$sno);
    $productid=$pdtid;
    $sql = "INSERT INTO `products`(`name`, `company_id`, `category_id`, `unit_id`, `pdt_id`, `unit_capacity`, `ppu`, `ppi`) VALUES ('$name','$company','$category','$unitname','$productid','$unitcapacity','$ppu','$ppi')";
    $result = $conn->query($sql);
    if ($result) {
        return $productid;
    } else {
        return 0;
    }
}

function UpdateProduct($conn,$pdt_id, $name, $company, $category, $unitname, $unitcapacity, $ppu, $ppi)
{
    $sql = "UPDATE `products` SET `name`='$name',`company_id`='$company',`category_id`='$category',`unit_id`='$unitname',`unit_capacity`='$unitcapacity',`ppu`='$ppu',`ppi`='$ppi' WHERE `pdt_id`='$pdt_id'";
    $result = $conn->query($sql);
    if ($result) {
        return $pdt_id;
    } else {
        return 0;
    }
}
