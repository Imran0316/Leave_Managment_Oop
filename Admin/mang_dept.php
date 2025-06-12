<?php
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$sql = "SELECT * FROM department";
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
                <h3 class="text-center mt-4  d-inline-block">Manage Departments</h3>

                <div class="container-fluid py-5">
                    <table class="table ">
                        <thead>
                            <tr>
                                <td>Department Name</td>
                                <td>Short Name</td>
                                <td>Department Code</td>
                                <td>Creation Time</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <?php
                        while ($data = mysqli_fetch_assoc($run)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $data["deptname"]; ?></td>
                                    <td><?php echo $data["deptsname"]; ?></td>
                                    <td><?php echo $data["deptcode"]; ?></td>
                                    <td><?php echo $data["time"]; ?></td>
                                    <td><a href="deptedit.php?id=<?php echo $data["id"]; ?>"><i
                                                class="fa-solid fa-pencil text-success"></i></a></td>
                                    <td><a href="deptdelete.php?id=<?php echo $data["id"]; ?>"><i
                                                class="fa-solid fa-trash-can text-danger "></i></a></td>

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