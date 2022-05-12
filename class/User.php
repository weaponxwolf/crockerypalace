<?php
function AddUser($conn, $firstname, $lastname, $email, $hashed_password, $phoneno, $qualification, $privilege, $role, $address, $city, $state, $country, $pincode)
{
    $sno = 1;
    $sql = "SELECT  MAX(sno) FROM `users`";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $sno = $row['MAX(sno)'] + 1;
    }
    $username = 'emp' . (string)($sno + 1000) . '@ckpalace.com';
    $sql = "INSERT INTO `users` ( `first_name`, `last_name`, `username`, `password`, `role`, `phone`, `email`, `qualification`, `address`, `privilege`,`city`,`state`,`country`,`pincode`) VALUES ('$firstname', '$lastname', '$username', '$hashed_password', '$role', '$phoneno', '$email', '$qualification', '$address', '$privilege','$city','$state','$country','$pincode')";
    $result = $conn->query($sql);
    if ($result) {
        return 1;
    } else {
        return 0;
    }
}