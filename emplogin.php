<?php
session_start();
if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    $sql = "SELECT * FROM employees WHERE email = '$email'";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        $dbpass = $data["password"];
        $_SESSION["name"] = $data["empfname"] ." ". $data["emplname"];
        $_SESSION["id"] = $data["id"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["password"] = $data["password"];
        if ($dbpass == $password) {
            header("Location: ./Employee/dashboard.php");
            exit();
        } else {
            header("Location: index.php");
            $_SESSION["error"] = "Incorect password";
            exit();
        }
    } else {
        header("Location: index.php");
        $_SESSION["error"] = "email not found";
        exit();
    }
    if ($run) {
    }
}
