<?php
session_start();

if (!isset($_SESSION["id"])) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}

$emp_id = $_SESSION["id"];
$conn = mysqli_connect("localhost", "root", "", "leavesys");

$total_sql = "SELECT COUNT(*) AS total FROM leaves WHERE employ_id =$emp_id";
$total_run = mysqli_query($conn, $total_sql);
$total_data = mysqli_fetch_assoc($total_run);

$approved_sql = "SELECT COUNT(*) AS approved FROM leaves WHERE lev_status_id = 2 && employ_id = $emp_id ";
$approved_run = mysqli_query($conn, $approved_sql);
$approved_data = mysqli_fetch_assoc($approved_run);

$new_sql = "SELECT COUNT(*) AS newapp FROM leaves WHERE DATE(time) = CURRENT_DATE() && employ_id = $emp_id ";
$new_run = mysqli_query($conn, $new_sql);
$new_data = mysqli_fetch_assoc($new_run);

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
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 mb-3 mb-sm-0  cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Leaves</h5>
                                <h2>
                                    <?php echo $total_data["total"]; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4  cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Approved Leaves</h5>
                                <h2>
                                    <?php echo $approved_data["approved"]; ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 cards">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Leaves Application</h5>
                                <h2>
                                    <?php echo $new_data["newapp"]; ?>
                                </h2>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="container-fluid w-100 border border-1">
                <h5>Latest Leaves Applications</h5>
            </div>


        </main>
    </div>
</div>


<?php 
include('../emp_include/emp_footer.php');
?>