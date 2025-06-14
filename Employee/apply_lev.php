<?php
session_start();

$conn = mysqli_connect("Localhost", "root", "", "leavesys");
$sql = "SELECT * FROM leavestype ";
$run = mysqli_query($conn, $sql);





$emp_id = $_SESSION["id"];
$dept_sql = "SELECT * FROM employees WHERE id = $emp_id";
$dept_run = mysqli_query($conn, $dept_sql);
$dept_data = mysqli_fetch_assoc($dept_run);



if (isset($_POST["lev_submit"])) {
    $leavetype = $_POST["leavetype"];
    $employ_id = $_POST["empid"];
    $status_id = $_POST["statusid"];
    $depart_id = $_POST["deptid"];
    $from = $_POST["fromdate"];
    $to = $_POST["todate"];
    $description = $_POST["description"];

    if(empty($leavetype ) || empty($from) || empty($to) || empty($description)){
        $_SESSION["error"] = "empty inputs";
    }else{

    $lev_sql = "INSERT INTO `leaves`(`leavetype_id`,`employ_id`,`department_name`,`lev_status_id`,`fromdate`, `todate`, `description`) VALUES ('$leavetype','$employ_id','$depart_id','$status_id','$from','$to','$description')";
    $run = mysqli_query($conn, $lev_sql);


    if ($run) {

        $leaves_id = mysqli_insert_id($conn);
        $status_default = 1;
        $remarks_default = "Waiting for approval";


        $action_sql = "INSERT INTO `admin_action`(`leaves_id`, `status_id`, `remarks`) VALUES ('$leaves_id','$status_default','$remarks_default')";

        $action_run = mysqli_query($conn, $action_sql);
        if ($action_run) {

            $_SESSION["success"] = "Submit successfully!";
            header("Location: apply_lev.php");
            exit();
        } else {
            $_SESSION["error"] = "Error inserting in admin_action table!";
            header("Location: apply_lev.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Error!";
        header("Location: apply_lev.php");
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



            <div class=" w-75 border border-1 w-50 p-3 mt-3">
                <form action="" method="post">
                    <select class="form-select" name="leavetype">
                        <option value="leave type">Leave Type</option>
                        <?php
                        while ($data = mysqli_fetch_assoc($run)) {
                            $lev_id=$data["id"];
                            $status_sql = "SELECT * FROM admin_action WHERE leaves_id = $lev_id";
                            $status_run = mysqli_query($conn, $status_sql);
                            $status_data = mysqli_fetch_assoc($status_run);
                            echo "<option>" . $data["id"] . $data["lev_type"] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="empid" value="<?php echo $_SESSION["id"] ?>" class="form-control"
                        id="">
                    <input type="hidden" name="statusid" value="<?php echo $status_data["status_id"] ?>" class="form-control"
                        id="">
                    <input type="hidden" name="deptid" value="<?php echo $dept_data["department_id"]; ?>" class="form-control"
                        id="">

                    <div class="row">
                        <div class="col-6">
                            <lable>From</lable>
                            <input type="date" onfocus="(this.type='date')" name="fromdate" placeholder="From"
                                class="form-control" id="">
                        </div>
                        <div class="col-6">
                            <lable>To</lable>
                            <input type="date" name="todate" placeholder="To" class="form-control" id="">
                        </div>
                    </div>
                    <lable>Description</lable>
                    <textarea class="form-control" name="description">

                         </textarea>

                    <input type="submit" value="Submit" name="lev_submit" class="btn btn-primary">
                </form>
            </div>





        </main>
    </div>
</div>

<?php
include('../emp_include/emp_footer.php');
?>