<?php
session_start();


if (isset($_POST["addemp"])) {
    $empcode = $_POST["empcode"];
    $empgender = $_POST["empgender"];
    $empdob = $_POST["dob"];
    $empfname = $_POST["fname"];
    $emplname = $_POST["lname"];
    $departments = $_POST["departments"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $password = $_POST["emppass"];
    $phone = $_POST["phone"];
    $cpassword = $_POST["cemppass"];


    $conn = mysqli_connect("localhost", "root", "", "leavesys");

    $sql = "INSERT INTO employees (
    empcode, empgender, empdob, empfname, emplname,
    department_id, address, email, city, country,
    password, phone) VALUES (
    '$empcode', '$empgender', '$empdob', '$empfname', '$emplname',
    '$departments', '$address', '$email', '$city', '$country',
    '$password', '$phone')";

    if (empty($empcode) || empty($empgender) || empty($empdob) || empty($empfname) || empty($emplname) || empty($departments) || empty($address) || empty($email) || empty($city) || empty($country) || empty($password) || empty($phone)) {
        $_SESSION['error'] = "empty field!";
        header("Location: emp_add.php");
        exit();
    }

    if ($password == $cpassword) {
        $run = mysqli_query($conn, $sql);
    } else {
        $_SESSION['error'] = "Paasword Does Not Match!";
        header("Location:  emp_add.php");
        exit();
    }


    if ($run) {
        $_SESSION['success'] = "Employee added successfully!";
        header("Location: emp_add.php");
        exit();
    } else {
        $_SESSION['error'] = "Error adding Employee!";
        header("Location:  emp_add.php");
        exit();
    }
}

$conn = mysqli_connect("localhost", "root", "", "leavesys");
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
            include("../include/sidebar.php");
            ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
                <h3 class="text-center mt-4  d-inline-block">Add Employee</h3>


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
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="empcode" id="" placeholder="Employee Code"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="col-3">
                                <select class="form-select  shadow-sm" name="empgender">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">other</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="date" name="dob" id="" placeholder="Date Of Birth"
                                    class="form-control  shadow-sm  ">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3">
                                <input type="text" name="fname" id="" placeholder="First Name"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="col-3">
                                <input type="text" name="lname" id="" placeholder="Last Name"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="col-3">
                                <select class="form-select  shadow-sm" name="departments">
                                    <option value="">Departments</option>
                                    <?php
                                    while ($data = $result->fetch_assoc()) {
                                        echo "<option>" . $data["id"] . " " . $data['deptname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="text" name="address" id="" placeholder="Address"
                                    class="form-control  shadow-sm ">
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <input type="email" name="email" id="" placeholder="Email"
                                        class="form-control  shadow-sm ">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="city" id="" placeholder="City"
                                        class="form-control  shadow-sm ">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="country" id="" placeholder="country"
                                        class="form-control  shadow-sm ">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <input type="password" name="emppass" id="" placeholder="Password"
                                        class="form-control  shadow-sm ">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone" id="" placeholder="Mobile Number"
                                        class="form-control  shadow-sm ">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <input type="password" name="cemppass" id="" placeholder="Confirm Password"
                                        class="form-control  shadow-sm ">
                                </div>
                                <div class="col-3">
                                    <input type="submit" value="Add" name="addemp" class="btn btn-primary">
                                </div>
                            </div>


                    </form>
                </div>





            </main>
        </div>
    </div>


  <?php
  include('../include/footer.php');
 ?>