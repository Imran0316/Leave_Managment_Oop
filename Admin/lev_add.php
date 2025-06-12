<?php
session_start();


if (isset($_POST["lev_add"])) {
    $levtype = $_POST["lev_type"];
    $levdesc = $_POST["lev_desc"];

    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    $sql = "INSERT INTO `leavestype`(`lev_type`, `discription`) VALUES ('$levtype','$levdesc')";
    $run = mysqli_query($conn, $sql);
    $success = "";
    if ($run) {
        $_SESSION['success'] = "Leave Type added successfully!";
        header("Location: lev_add.php");
        exit();
    } else {
        $_SESSION['error'] = "Error adding Leave Type!";
        header("Location:  lev_add.php");
        exit();
    }
}
?>

<style>
    input:focus {
        outline: none !important;
        box-shadow: none !important;
        border-bottom-color: blue !important;
    }
</style>

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
            <h3 class="text-center mt-4  d-inline-block">Add Leave Type</h3>


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



            <div class="f_c w-50 p-3 mt-3">
                <form action="" method="post">
                    <label class="form-label">Leave Type</label>
                    <input type="text" name="lev_type" class="form-control " id=""> <br>
                    <label class="form-label">Discription</label>
                    <input type="text" name="lev_desc" class="form-control" id=""> <br>


                    <input type="submit" value="Add" name="lev_add" class="btn-primary btn">
                </form>
            </div>





        </main>
    </div>
</div>


 <?php
  include('../include/footer.php');
 ?>