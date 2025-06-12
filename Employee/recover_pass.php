<?php
session_start();
if (isset($_POST["reset"])) {
    $empid = $_POST["empid"];
    $email = $_POST["email"];

    $conn = mysqli_connect("localhost", "root", "", "leavesys");
    $sql = "SELECT * FROM employees WHERE empcode = $empid";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        $db_email = $data["email"];
        $db_empid = $data["empcode"];
        $_SESSION["id"] = $data["id"];
        if ($db_empid == $empid) {
            if ($db_email == $email) {
                $_SESSION['show_password_form'] = true;
                header("Location: recover_pass.php");
                exit();
            } else {
                header("Location: recover_pass.php");
                $_SESSION["error"] = "Email not found";
                exit();
            }
        }
    } else {
        header("Location: recover_pass.php");
        $_SESSION["error"] = "employee id incorrect";
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
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">
                                <span data-feather="home"></span>
                                Employee Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="recover_pass.php">
                                <span data-feather="home"></span>
                                Employee Password Recovery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../adminlogin.php">
                                <span data-feather="home"></span>
                                Admin Login
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <h1 class="text-capitalize text-center mt-3">
                    Welcome to <br> employee leave managment system
                </h1>
                <h2 class="text-center">Employee Password Recovery</h2>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
                <div class="container w-50 py-3 mt-5 border border-1">
                    <form action="" method="post">
                        <label class="form-label">Employee ID</label>
                        <input type="text" name="empid" id="" class="form-control"> <br>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="" class="form-control"> <br>

                        <input type="submit" value="Reset" name="reset" class="btn btn-primary"> <br> <br>
                    </form>
                        <?php if (isset($_SESSION["show_password_form"]) && $_SESSION["show_password_form"]) { ?>
                            <h6>Reset Password</h6>
                            <form action="reset_pass.php" method="post">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_pass" id="" class="form-control"> <br>
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_pass" id="" class="form-control"> <br>

                                <input type="submit" value="change Password" name="change_pass" class="btn btn-primary">
                            </form>

                        <?php unset($_SESSION["show_password_form"]);
                        } ?>
                </div>

            </main>
        </div>
    </div>


<?php
include('../emp_include/emp_footer.php');
?>