<?php
session_start();
if (isset($_POST["change_pass"])) {
    $new_pass = $_POST["new_pass"];
    $confirm_pass = $_POST["confirm_pass"];
    $id = $_SESSION["id"];
    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    if ($new_pass == $confirm_pass) {
        $sql = "UPDATE `employees` SET `password`='{$new_pass}' WHERE id ='{$id}'";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $_SESSION["success"] = "password reset successfully";
            header("Location: recover_pass.php");
            exit();
        } else {
            $_SESSION["error"] = "Error!";
            header("Location: recover_pass.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Password doesn't match!";
        header("Location: recover_pass.php");
        exit();
    }
}
?>