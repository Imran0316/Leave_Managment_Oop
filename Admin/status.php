<?php

$conn=mysqli_connect("localhost","root","","leavesys");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $currentStatus = $_POST['current_status'];

    $newStatus = ($currentStatus == 'Active') ? 'Inactive' : 'Active';
    $sql = "UPDATE employees SET status = '$newStatus' WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: emp_manag.php"); 
    exit();
}
?>


