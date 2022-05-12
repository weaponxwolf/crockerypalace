<?php
include '../conn/db.php';
$username=$_GET['id'];
$sql = "DELETE FROM `users` WHERE `username`='$username'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} 