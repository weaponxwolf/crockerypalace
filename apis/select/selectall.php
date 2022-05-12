
<?php
require_once '../../conn/db.php';
$table = $_GET['data'];
if ($table == 'users' || $table == 'login_history') {
    echo "NO ACCESS";
} else {
    if (isset($_GET['search']) && isset($_GET['value'])) {
        $column_name = $_GET['search'];
        $value = $_GET['value'];
        $sql = "SELECT * FROM " . $table . " WHERE " . $column_name . "='" . $value . "'";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
        $emparray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        $x = json_encode($emparray);
        echo $x;
    } else {
        $sql = "SELECT * FROM " . $table;
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

        //create an array
        $emparray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $emparray[] = $row;
        }
        $x = json_encode($emparray);
        echo $x;
    }
}
?>
