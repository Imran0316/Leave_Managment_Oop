<?php
session_start();

if (isset($_POST["pass_recover"])) {
    $curr_pass = $_POST["curr_pass"];
    $new_pass = $_POST["new_pass"];
    $confirm_pass = $_POST["confirm_pass"];
    $id = $_SESSION["id"];
    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    $sql = "SELECT `password` FROM `employees` WHERE id = {$id}";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        $dbpass = $data["password"];
        if ($dbpass == $curr_pass) {
            if ($new_pass == $confirm_pass) {
                $pass_sql = "UPDATE `employees` SET `password`='{$new_pass}' WHERE id = {$id}";
                $pass_run = mysqli_query($conn, $pass_sql);
                header("location: change_pass.php");
                $_SESSION["success"] = "password changed successffully";
                exit();
            } else {
                header("location: change_pass.php");
                $_SESSION["error"] = "password doesn't match!";
                exit();
            }
        } else {
            header("location: change_pass.php");
            $_SESSION["error"] = "Inccorrect password!";
            exit();
        }
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
        include("../emp_include/emp_sidebar.php");
        ?>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main">
            <h3 class="text-center mt-4  d-inline-block">Employee Password recovery</h3>


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



            <div class=" w-50 border border-1 w-50 p-3 mt-3">
                <form action="" method="post">
                    <input type="password" name="curr_pass" class="form-control" placeholder="Current Password"
                        id=""> <br>
                    <input type="password" name="new_pass" class="form-control" placeholder="New password" id="">
                    <br>
                    <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm Password"
                        id=""> <br>

                    <input type="submit" value="change" name="pass_recover" class="btn btn-primary">
                </form>
            </div>





        </main>
    </div>
</div>


<?php
include('../emp_include/emp_footer.php');
?>