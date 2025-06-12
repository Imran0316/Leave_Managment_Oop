<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$emp_sql = "SELECT COUNT(*) AS total FROM employees";
$emp_act = "SELECT COUNT(*) AS act_count FROM employees WHERE status = 'active'";
$emp_run = mysqli_query($conn, $emp_sql);
$emp_data = mysqli_fetch_assoc($emp_run);

$active_run = mysqli_query($conn, $emp_act);
$active_data = mysqli_fetch_assoc($active_run);

$dep_sql = "SELECT COUNT(*) AS total FROM department";
$dept_run = mysqli_query($conn, $dep_sql);
$dept_data = mysqli_fetch_assoc($dept_run);

$lev_sql = "SELECT COUNT(*) AS total FROM leavestype";
$lev_run = mysqli_query($conn, $lev_sql);
$lev_data = mysqli_fetch_assoc($lev_run);

$leaves_sql = "SELECT COUNT(*) AS total FROM leaves";
$leaves_run = mysqli_query($conn, $leaves_sql);
$leaves_data = mysqli_fetch_assoc($leaves_run);

$approved_sql = "SELECT COUNT(*) AS approved FROM leaves WHERE lev_status_id = 2";
$approved_run = mysqli_query($conn, $approved_sql);
$approved_data = mysqli_fetch_assoc($approved_run);

$newapp_sql = "SELECT COUNT(*) AS new_application FROM leaves WHERE DATE(time) = CURRENT_DATE()";
$newapp_run = mysqli_query($conn, $newapp_sql);
$newapp_data = mysqli_fetch_assoc($newapp_run);



?>

<style>
    .cards {
        margin-bottom: 5px;
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

        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
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

            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0  cards">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h5 class="card-title">Total Registered employee</h5>
                                        <h1 class="card-text text-primary"><?php echo $emp_data['total']; ?></h1>
                                    </div>
                                    <div class="col-4">
                                        <h5>Active Employees</h5>
                                        <span class="text-danger "> <?php echo $active_data['act_count']; ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3  cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Listed Dpartments</h5>
                                <h1 class="card-text text-primary"><?php echo $dept_data['total']; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Listed Leave Type</h5>
                                <h1 class="card-text text-primary"><?php echo $lev_data['total']; ?></h1>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4 cards mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Leaves</h5>
                                <h1 class="card-text text-primary"> <?php echo $leaves_data["total"] ?> </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Approved Leaves</h5>
                                <h1 class="card-text text-success">
                                    <?php echo $approved_data["approved"] ?>
                                </h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 cards">
                        <a href="pending_leaves.php " class="nav-link">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">New Leaves Application</h5>
                                    <h1 class="card-text text-danger">
                                        <?php echo $newapp_data["new_application"] ?>
                                    </h1>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>




        </main>
    </div>
</div>


 <?php
  include('../include/footer.php');
 ?>