<?php
session_start();
if(isset($_POST["lev_update"])){
    $id=$_POST["id"];
    $levtype=$_POST["lev_type"];
    $levdesc=$_POST["lev_desc"];

    $conn=mysqli_connect("localhost","root","","leavesys");
    $sql="UPDATE `leavestype` SET `lev_type`='{$levtype}',`discription`='{$levdesc}' WHERE id = '{$id}'";
    $run=mysqli_query($conn,$sql);
    if($run){
      header("Location: lev_manag.php");
      $_SESSION["success"] = " updated successfully!";
      exit();
    }else{
        header("Location: lev_manag.php");
      $_SESSION["error"] = "error  updating!";
      exit();
    }
 

}
?>