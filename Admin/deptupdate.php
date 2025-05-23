<?php
if(isset($_POST["deptupdate"])){
    $id=$_POST["id"];
    $deptname=$_POST["deptname"];
    $deptsname=$_POST["deptsname"];
    $deptcode=$_POST["deptcode"];

    $conn=mysqli_connect("localhost","root","","leavesys");
    $sql="UPDATE `department` SET `deptname`='{$deptname}',`deptsname`='{$deptsname}',`deptcode`='{$deptcode}' WHERE id = '{$id}'";
    $run=mysqli_query($conn,$sql);
    if($run){
      header("Location: mang_dept.php");
    }else{
        echo "error";
    }

}
?>