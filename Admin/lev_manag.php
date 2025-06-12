<?php
session_start();
$sr = 1;
$conn = mysqli_connect("localhost", "root", "", "leavesys");
$sql = "SELECT * FROM leavestype";
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
                <h3 class="text-center mt-4  d-inline-block">Manage Leaves Types</h3>
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
                                <td>Leave Types</td>
                                <td>Discription</td>
                                <td>Created At</td>
                                <td>Edit</td>
                                <td>Deleted</td>

                            </tr>
                        </thead>
                        <?php
                        while ($data = mysqli_fetch_assoc($run)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sr++; ?></td>
                                    <td><?php echo $data["lev_type"]; ?></td>
                                    <td><?php echo $data["discription"]; ?></td>
                                    <td><?php echo $data["created_at"]; ?></td>
                                    <td><a href="lev_edit.php?id=<?php echo $data["id"]; ?>"><i
                                                class="fa-solid fa-pencil text-success"></i></a></td>
                                    <td><a href="lev_delete.php?id=<?php echo $data["id"]; ?>"><i
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