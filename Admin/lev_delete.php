<?php
session_start();
$conn=mysqli_connect("localhost","root","","leavesys");
$id=$_GET["id"];
$sql="DELETE FROM leavestype WHERE id = '{$id}'";
$run=mysqli_query($conn,$sql);
if($run){
    header("Location: lev_manag.php");
    $_SESSION["success"] = "Deleted successfully";
    exit();

}else{
    header("Location: lev_manag.php");
    $_SESSION["error"] = "Error deleting!";
    exit();
}

?>