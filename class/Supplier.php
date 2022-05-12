
<?php
function AddSupplier($conn, $name, $country, $state, $city, $address, $address2, $postal_code, $phone, $fax, $url, $email, $comapnies_deal_with, $notes)
{
    $sql = "INSERT INTO `suppliers`(`name`, `address`, `address2`, `city`, `state`, `postal_code`, `country`, `phone`, `fax`, `email`, `url`, `companies_deal_with`, `notes`) VALUES ('$name','$address','$address2','$city','$state','$postal_code','$country','$phone','$fax','$email','$url','$comapnies_deal_with','$notes')";
    $result = $conn->query($sql);
    if ($result) {
        $sql = "SELECT MAX(supplier_id) FROM `suppliers`";
        $result2 = $conn->query($sql);
        while ($row = mysqli_fetch_array($result2)) {
            return $row[0];
        }
    } else {
        return 0;
    }
}

function UpdateSupplier($conn, $id, $name, $country, $state, $city, $address, $address2, $postal_code, $phone, $fax, $url, $email, $comapnies_deal_with, $notes)
{
    $sql = "UPDATE `suppliers` SET `name`='$name',`address`='$address',`address2`='$address2',`city`='$city',`state`='$state',`postal_code`='$postal_code',`country`='$country',`phone`='$phone',`fax`='$fax',`email`='$email',`url`='$url',`companies_deal_with`='$comapnies_deal_with',`notes`='$notes' WHERE `supplier_id`='$id'";
    $result = $conn->query($sql);
    if ($result) {
        $sql = "SELECT MAX(supplier_id) FROM `suppliers`";
        $result2 = $conn->query($sql);
        while ($row = mysqli_fetch_array($result2)) {
            return $row[0];
        }
    } else {
        return 0;
    }
}
