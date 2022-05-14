<?php

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 
session_start();
session_unset();
session_destroy();
header('Location: index.php');
