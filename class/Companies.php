<?php
function AddCompany($conn, $name, $cin, $contact, $email, $website, $state, $country, $city, $address, $pincode)
{

    $regid = date("ydmhis");
    $sql = "INSERT INTO `companies`( `name`, `reg_id`, `cin`, `contact`, `email`, `website`, `state`, `country`, `city`, `address`, `pincode`) VALUES ('$name','$regid','$cin','$contact','$email','$website','$state','$country','$city','$address','$pincode')";

    $result = $conn->query($sql);
    if ($result) {
        return $regid;
    } else {
        return 0;
    }
}

function UpdateCompany($conn,$regid, $name, $cin, $contact, $email, $website, $state, $country, $city, $address, $pincode)
{

    $sql = "UPDATE `companies` SET `name`='$name',`cin`='$cin',`contact`='$contact',`email`='$email',`website`='$website',`state`='$state',`country`='$country',`city`='$city',`address`='$address',`pincode`='$pincode' WHERE `reg_id`='$regid'";
    $result = $conn->query($sql);
    if ($result) {
        return $regid;
    } else {
        return 0;
    }
}
