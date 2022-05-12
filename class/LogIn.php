<?php
function LogIn($conn, $username, $password)
{

    $sql = "SELECT * FROM `users` WHERE `username`='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password']) == true) {
                return 1;
            }
        }
    } else {
        return 0;
    }
}

function RegisterLogin($conn, $username)
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    $sql = "INSERT INTO `login_history`( `username`, `ip_address`) VALUES ('$username','$ipaddress')";
    $result = $conn->query($sql);
    if ($result) {
        return 1;
    } else {
        return 0;
    }
}

function RegisterSession($conn, $username)
{
    $sql = "SELECT * FROM `users` WHERE `username`='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        print_r($result);
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username']=$username;
            $_SESSION['first_name']=$row['first_name'];
            $_SESSION['last_name']=$row['last_name'];
            $_SESSION['role']=$row['role'];
            $_SESSION['privilege']=$row['privilege'];
            echo "Hiii";
            return 1;
        }
    } else {
        return 0;
    }
}
