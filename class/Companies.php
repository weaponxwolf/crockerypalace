<?php
function AddCompany($conn, $name, $contact, $email, $website, $state, $country, $city, $address, $pincode)
{
    $sql2 = "SELECT * FROM `companies` WHERE `name`='$name'";
    $result2 = $conn->query($sql2);
    if ($result2) {
        if (mysqli_num_rows($result2) > 0) {
            return 0;
        } else {
            $regid = date("ydmhis");
            $sql = "INSERT INTO `companies`( `name`, `reg_id`, `contact`, `email`, `website`, `state`, `country`, `city`, `address`, `pincode`) VALUES ('$name','$regid','$contact','$email','$website','$state','$country','$city','$address','$pincode')";

            $result = $conn->query($sql);
            if ($result) {
                return $regid;
            } else {
                return 0;
            }
        }
    }
}

function UpdateCompany($conn, $regid, $name, $contact, $email, $website, $state, $country, $city, $address, $pincode)
{

    $sql = "UPDATE `companies` SET `name`='$name',`contact`='$contact',`email`='$email',`website`='$website',`state`='$state',`country`='$country',`city`='$city',`address`='$address',`pincode`='$pincode' WHERE `reg_id`='$regid'";
    $result = $conn->query($sql);
    if ($result) {
        return $regid;
    } else {
        return 0;
    }
}
