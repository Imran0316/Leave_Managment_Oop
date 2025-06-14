<?php
session_start();
$sr = 1;
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$sql = "SELECT employees.*, department.deptname AS department_name FROM employees 
JOIN department ON employees.department_id = department.id";
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
                <div class="search-box">
                    <h3 class="text-center mt-4  d-inline-block">Manage Employees</h3>
                    <form action="" method="get">
                    <input name="search" class="form-control form-control-dark w-100" type="search" placeholder="Search" aria-label="Search">
                    <input type="submit" name="search" value="search" id="">
                    </form>
                </div>

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
                                <td>Emp id</td>
                                <td>Full Name</td>
                                <td>Department </td>
                                <td>Regestration Time</td>
                                <td>Status</td>
                                <td>action</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <?php
                        while ($data = mysqli_fetch_assoc($run)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sr++; ?></td>
                                    <td><?php echo $data["empcode"]; ?></td>
                                    <td><?php echo $data["empfname"] . " " . $data["emplname"]  ?></td>
                                    <td><?php echo $data["department_name"]; ?></td>
                                    <td><?php echo $data["created_at"]; ?></td>
                                    <td><?php echo $data["status"]; ?></td>
                                    <td>
                                        <form action="status.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $data["id"] ?>">
                                            <input type="hidden" name="current_status"
                                                value="<?php echo $data["status"] ?>">
                                            <button type="submit" class="btn btn-sm">
                                                <?php
                                                if ($data['status'] === "Active") {
                                                    echo "<i class='bi bi-x-lg text-danger'></i> ";
                                                } else {
                                                    echo "<i class='bi bi-check-lg text-success'></i>";
                                                }
                                                ?>
                                            </button>
                                    </td>
                                    <td><a href="empedit.php?id=<?php echo $data["id"]; ?>"><i
                                                class="fa-solid fa-pencil text-success"></i></a></td>
                                    <td><a href="empdelete.php?id=<?php echo $data["id"]; ?>"><i
                                                class="fa-solid fa-trash-can text-danger "></i></a></td>
                                    </form>



                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                <?php } ?>
                </div>






            </main>
        </div>
    </div>

    <?php
    include('../include/footer.php');
    ?>