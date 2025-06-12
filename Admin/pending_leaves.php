<?php
session_start();
$sr = 1;
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$sql = "SELECT leaves.*, 
leavestype.lev_type AS type_name, 
employees.empfname AS fname,
employees.emplname AS lname,
employees.empcode AS code,
employees.id AS empid
FROM leaves
JOIN leavestype ON leaves.leavetype_id = leavestype.id
JOIN employees ON leaves.employ_id = employees.id
WHERE lev_status_id = 1;
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
            include("../include/sidebar.php");
            ?>


            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
                <h3 class="text-center mt-4  d-inline-block">Pending Leaves</h3>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success border">
                        <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <div class="container-fluid py-5">
                    <table class="table ">
                        <thead>
                            <tr>
                                <td>Sr no.</td>
                                <td>Employee Name</td>
                                <td>Leave Type</td>
                                <td>Posting Date</td>
                                <td>Status</td>
                                <td>action</td>

                            </tr>
                        </thead>
                        <?php
                        while ($data = mysqli_fetch_assoc($run)) {
                            $lev_id = $data["id"];
                            $status_sql = "SELECT admin_action.*,
                                lev_status.name AS status_name
                                FROM admin_action
                                JOIN lev_status ON admin_action.status_id = lev_status.id
                                WHERE leaves_id =$lev_id
                                ";
                            $status_run = mysqli_query($conn, $status_sql);
                            $status_data = mysqli_fetch_assoc($status_run);
                        ?>
                            <tbody>
                                <tr>
                                    <td> <?php echo $sr++ ?></td>
                                    <td> <?php echo $data["fname"] . " " . $data["lname"] . "(" . $data["code"] . ")" ?></td>
                                    <td> <?php echo $data["type_name"]  ?></td>
                                    <td> <?php echo $data["time"]  ?></td>
                                    <td> <?php echo $status_data["status_name"]  ?></td>
                                    <td> <a href="lev_details.php?id=<?php echo $data["empid"]; ?>" class="btn btn-primary p-1 ">Details</a></td>
                                    <?php
                                    $_SESSION["emp_id"] = $data["empid"];
                                    ?>




                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                <?php } else {
                echo "data not found";
            } ?>
                </div>






            </main>
        </div>
    </div>


    <?php
  include('../include/footer.php');
 ?>