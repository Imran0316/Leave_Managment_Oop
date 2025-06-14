<?php
session_start();
$emp_id = $_SESSION["id"];
$conn = mysqli_connect("Localhost", "root", "", "leavesys");
$sql = "SELECT leaves.*, 
leavestype.lev_type AS leave_type
FROM leaves 
JOIN leavestype ON leaves.leavetype_id = leavestype.id
WHERE employ_id = $emp_id
";
$run = mysqli_query($conn, $sql);

if (mysqli_num_rows($run) > 0) {






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
                <h3 class="text-center mt-4  d-inline-block">Leaves History</h3>


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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr. no</th>
                                <th>Leave type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Description</th>
                                <th>Remarks</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php
                        $sr = 1;
                        while ($data = mysqli_fetch_assoc($run)) {
                            $lev_id = $data["id"];
                            $admin_sql = "SELECT admin_action.*,
                            lev_status.name AS status_name
                            FROM admin_action
                            JOIN lev_status  ON admin_action.status_id = lev_status.id
                            WHERE leaves_id = $lev_id  ";   
                            $admin_run = mysqli_query($conn, $admin_sql);
                            $admin_data = mysqli_fetch_assoc($admin_run);
                         
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sr++ ?></td>
                                    <td><?php echo $data["leave_type"] ?></td>
                                    <td><?php echo $data["fromdate"] ?></td>
                                    <td><?php echo $data["todate"] ?></td>
                                    <td><?php echo $data["description"] ?></td>
                                    <td><?php echo $admin_data["remarks"] ?></td>
                                    <td><?php echo $admin_data["status_name"] ?></td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                <?php } else {
                $_SESSION["error"] = "No leaves found";
                header("Location: apply_lev.php");
                exit();
            } ?>
                </div>





            </main>
        </div>
    </div>



    <?php
    include('../emp_include/emp_footer.php');
    ?>