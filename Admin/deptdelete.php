<?php
$conn=mysqli_connect("localhost","root","","leavesys");
$id=$_GET["id"];
$sql="DELETE FROM department WHERE id= '{$id}'";
$run=mysqli_query($conn,$sql);
if($run){
 header("Location:mang_dept.php");
}

?>