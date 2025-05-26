<?php
session_start();
 if(isset($_POST["updemp"])){
    $id=$_POST["id"];
    $empgender= $_POST["empgender"];
    $empdob= $_POST["dob"];
    $empfname= $_POST["fname"];
    $emplname= $_POST["lname"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $city= $_POST["city"];
    $country= $_POST["country"];
    $phone=$_POST["phone"];
   
    
    $conn=mysqli_connect("localhost","root","","leavesys");
    $upd_sql="UPDATE `employees` SET `empgender`='{$empgender}',`empdob`='{$empdob}',`empfname`='{$empfname}',`emplname`='{$emplname}',`address`='{$address}',`email`='{$email}',`city`='{$city}',`country`='{$country}',`phone`='{$phone}' WHERE id = {$id}";

      $run=mysqli_query($conn,$upd_sql);
     
        if ($run) {
            $_SESSION['success'] = "Employee updated successfully!";
            header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Error updating Employee!";
        header("Location:  dashboard.php");
        exit();
    }
 }
?>