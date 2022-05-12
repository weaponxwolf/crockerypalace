<?php

$sql = "";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        return 1;
    }
} else
{
    return 0;
}