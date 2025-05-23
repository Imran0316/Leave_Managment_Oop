<?php
session_start();
$conn=mysqli_connect("localhost","root","","leavesys");
$id=$_GET["id"];
$del_sql="DELETE FROM employees WHERE id = '{$id}'";
$del_run=mysqli_query($conn,$del_sql);
if($del_run){
    header("Location: emp_manag.php");
    $_SESSION["success"] = "Employee Deleted Successfully";
    exit();
}else{
    header("Location: emp_manag.php");
    $_SESSION["error"] = "Employee Deleted Error";
    exit();

}
?>