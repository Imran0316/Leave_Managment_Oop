<?php
session_start();
 if(isset($_POST["updemp"])){
    $id=$_POST["id"];
    $empcode= $_POST["empcode"];
    $empgender= $_POST["empgender"];
    $empdob= $_POST["dob"];
    $empfname= $_POST["fname"];
    $emplname= $_POST["lname"];
    $departments= $_POST["departments"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $city= $_POST["city"];
    $country= $_POST["country"];
    $password=$_POST["emppass"];
    $phone=$_POST["phone"];
    $cpassword=$_POST["cemppass"];
   
    
    $conn=mysqli_connect("localhost","root","","leavesys");
    $upd_sql="UPDATE `employees` SET `empcode`='{$empcode}',`empgender`='{$empgender}',`empdob`='{$empdob}',`empfname`='{$empfname}',`emplname`='{$emplname}',`department_id`='{$departments}',`address`='{$address}',`email`='{$email}',`city`='{$city}',`country`='{$country}',`password`='{$password}',`phone`='{$phone}',`cpassword`='{$cpassword}' WHERE id = {$id}";

      $run=mysqli_query($conn,$upd_sql);
     
        if ($run) {
            header("Location: emp_manag.php");
        $_SESSION['success'] = "Employee updated successfully!";
        exit();
    } else {
        header("Location:  empedit.php");
        $_SESSION['error'] = "Error updating Employee!";
        exit();
    }
 }
?>