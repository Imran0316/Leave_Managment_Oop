<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "leavesys");
$id = $_GET["id"];
$sql_edit = "SELECT * FROM employees WHERE id ='{$id}'";
$run_edit = mysqli_query($conn, $sql_edit);
$edit_data = mysqli_fetch_assoc($run_edit);




$sql_dep = "SELECT id, deptname FROM department";
$result = $conn->query($sql_dep);

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

        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
            <h3 class="text-center mt-4  d-inline-block">Employee Profile</h3>


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



            <div class="container-fluid main w-100 border border-1 w-50 p-3 mt-3">
                <form action="update_profile.php" method="post">
                    <div class="row">
                        <div class="">
                            <input type="hidden" name="id" value="<?php echo $edit_data["id"] ?>" id="" placeholder="Employee Code"
                                class="form-control  shadow-sm ">

                        </div>
                        <div class="col-6">
                            <select class="form-select  shadow-sm" name="empgender">
                                <option value="<?php echo $edit_data["empgender"] ?>">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="date" name="dob" value="<?php echo $edit_data["empdob"] ?>" id="" placeholder="Date Of Birth"
                                class="form-control  shadow-sm  ">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-3">
                            <input type="text" name="fname" value="<?php echo $edit_data["empfname"] ?>" id="" placeholder="First Name"
                                class="form-control  shadow-sm ">
                        </div>
                        <div class="col-3">
                            <input type="text" name="lname" id="" placeholder="Last Name" value="<?php echo $edit_data["emplname"] ?>"
                                class="form-control  shadow-sm ">
                        </div>

                        <div class="col-6">
                            <input type="text" value="<?php echo $edit_data["address"] ?>" name="address" id="" placeholder="Address"
                                class="form-control  shadow-sm ">
                        </div>
                        <div class="row mt-5">
                            <div class="col-6">
                                <input type="email" name="email" value="<?php echo $edit_data["email"] ?>" id="" placeholder="Email"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="col-3">
                                <input type="text" name="city" value="<?php echo $edit_data["city"] ?>" id="" placeholder="City"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="col-3">
                                <input type="text" name="country" value="<?php echo $edit_data["country"] ?>" id="" placeholder="country"
                                    class="form-control  shadow-sm ">
                            </div>
                        </div>
                        <div class="row mt-5">

                            <div class="col-6">
                                <input type="text" name="phone" id="" value="<?php echo $edit_data["phone"] ?>" placeholder="Mobile Number"
                                    class="form-control  shadow-sm ">
                            </div>
                        </div>
                        <div class="row mt-5">

                            <div class="col-3">
                                <input type="submit" value="update" name="updemp" class="btn btn-primary">
                            </div>
                        </div>


                </form>
            </div>





        </main>
    </div>
</div>


<?php
include('../emp_include/emp_footer.php');
?>