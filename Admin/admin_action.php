<?php
session_start();

if (isset($_POST["admin_action"])) {
    $status = $_POST["status"];
    $remark = $_POST["remark"];
    $leave_id = $_POST["leave_id"];


    $conn = mysqli_connect("localhost", "root", "", "leavesys");

    $sql = "UPDATE `admin_action` 
            SET `status_id` = '$status', `remarks` = '$remark', `time` = NOW() 
            WHERE `leaves_id` = '$leave_id'";
    $sql2="UPDATE  `leaves` SET `lev_status_id` = '$status' WHERE `id` = '$leave_id'";

    $run = mysqli_query($conn, $sql);
    $run2=mysqli_query($conn, $sql2);

    if ($run && $run2) {
        $_SESSION["success"] = "Action Recorded";
    } else {
        $_SESSION["error"] = "Action Error: " . mysqli_error($conn); // helpful for debugging
    }

   header("Location: lev_details.php");
    exit();
}
