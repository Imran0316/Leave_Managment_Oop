<?php
session_start();
$sr = 1;
$id = $_GET["id"];
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$sql = "SELECT leaves.*, 
employees.empfname AS fname,
employees.emplname AS lname,
employees.empcode AS code,
employees.email AS email,
employees.phone  AS empTel,
employees.empgender AS gender,
leavestype.lev_type AS type_name,
department.deptname AS depart_name
FROM leaves
JOIN employees ON leaves.employ_id=employees.id
JOIN leavestype ON leaves.leavetype_id=leavestype.id
JOIN department ON leaves.department_name=department.id
WHERE leaves.id=$id
";
$run = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($run);
$current_status = $data["lev_status_id"];
$lev_id=$data["id"];
$admin_sql="SELECT admin_action.*,
lev_status.name AS sta_name
FROM admin_action
JOIN lev_status ON admin_action.status_id=lev_status.id
WHERE leaves_id = $lev_id
";
$admin_run = mysqli_query($conn, $admin_sql);
$admin_data= mysqli_fetch_assoc($admin_run);



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
                <h3 class="text-center mt-4  d-inline-block">Leaves Details</h3>
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
                    <table class="table">
                        <tr>
                            <th>Employee Name: </th>
                            <td> <?php echo $data["fname"] . " " . $data["lname"] ?> </td>
                            <th>Employee Id: </th>
                            <td> <?php echo $data["code"] ?> </td>
                            <th>Gender: </th>
                            <td> <?php echo $data["gender"] ?> </td>
                        </tr>
                        <tr>
                            <th>Employee Email:</th>
                            <td><?php echo $data["email"] ?></td>
                            <th>Employee Contact No:</th>
                            <td><?php echo $data["empTel"] ?></td>
                            <th>Employee Department:</th>
                            <td><?php echo $data["depart_name"] ?></td>
                        </tr>
                        <tr>
                            <th>Leave Type:</th>
                            <td><?php echo $data["type_name"] ?></td>
                            <th>Leave Dates:</th>
                            <td><?php echo $data["fromdate"] . "<b> To </b> " . $data["todate"] ?></td>
                            <th>Posting Date</th>
                            <td><?php echo $data["time"] ?></td>
                        </tr>
                        <tr>
                            <th>Employee Leave Description:</th>
                            <td><?php echo $data["description"] ?></td>
                        </tr>
                        <tr>
                            <th>Leave Status:</th>
                            <td class="text-primary"><?php echo $admin_data["sta_name"] ?></td>
                        </tr>
                        <tr>
                            <th>Admin Remark:</th>
                            <td><?php echo $admin_data["remarks"] ?></td>
                        </tr>
                        <tr>
                            <th>Action Taken Date:</th>
                            <td class=""></td>
                        </tr>
                    </table>
                    <button class="btn btn-success">Take Action</button>

                    <!-- Button to Open Modal -->
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#centeredModal">
                        Open Centered Modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="centeredModal" tabindex="-1" aria-labelledby="centeredModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="centeredModalLabel">Take Action</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="admin_action.php" method="post">
                                        <label for="status">Update Status</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="1" <?php echo ($current_status == '1') ? 'selected' : '' ?>>pending</option>
                                            <option value="2" <?php echo ($current_status == '2') ? 'selected' : '' ?>>approved</option>
                                            <option value="3" <?php echo ($current_status == '3') ? 'selected' : '' ?>>rejected</option>
                                        </select>
                                        <label>Remarks</label> <br>
                                        <textarea class="form-control" name="remark"></textarea>
                                        <input type="hidden" name="leave_id" value="<?php echo $admin_data["leaves_id"] ?>">

                                        <button type="submit"  name="admin_action" class="btn btn-secondary" data-bs-dismiss="modal">submit</button>

                                    </form>
                                </div>

                                <!-- Modal Footer -->

                            </div>
                        </div>
                    </div>



                </div>






            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper (Bootstrap 5.3.3) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

   <?php
  include('../include/footer.php');
 ?>