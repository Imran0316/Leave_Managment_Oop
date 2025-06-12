<?php
session_start();


if (isset($_POST["deptadd"])) {
    $deptname = $_POST["deptname"];
    $deptsname = $_POST["deptsname"];
    $deptcode = $_POST["deptcode"];

    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    $sql = "INSERT INTO `department`(`deptname`, `deptsname`, `deptcode`) VALUES ('$deptname','$deptsname','$deptcode')";
    $run = mysqli_query($conn, $sql);
    $success = "";
    if ($run) {
        $_SESSION['success'] = "Department added successfully!";
        header("Location: add_dept.php");
        exit();
    } else {
        $_SESSION['error'] = "Error adding department!";
        header("Location:  add_dept.php");
        exit();
    }
}
?>

<?php
include("../include/meta.php");
include("../include/navbar.php");
?>

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../include/sidebar.php");
            ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
                <h3 class="text-center mt-4  d-inline-block">Add Department</h3>


                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success border">
                        <?= $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>



                <div class=" border border-1 w-50 p-3 mt-3">
                    <form action="" method="post">
                        <label class="form-label">Department Name</label>
                        <input type="text" name="deptname" class="form-control " id=""> <br>
                        <label class="form-label">Department Short Name</label>
                        <input type="text" name="deptsname" class="form-control" id=""> <br>
                        <label class="form-label">Department Code</label>
                        <input type="text" name="deptcode" class="form-control" id=""> <br>

                        <input type="submit" value="Add" name="deptadd" class="btn-primary btn">
                    </form>
                </div>





            </main>
        </div>
    </div>


 <?php
  include('../include/footer.php');
 ?>