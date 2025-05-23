<?php
session_start();


if(isset($_POST["addemp"])){
    $empcode= $_POST["empcode"];
    $empgender= $_POST["empgender"];
    $empdob= $_POST["dob"];
    $empfname= $_POST["fname"];
    $emplname= $_POST["lname"];
    $departments= $_POST["departments"];
    $address= $_POST["address"];
    $email= $_POST["email"];
    $city= $_POST["city"];
    $country= $_POST["country"];
    $password=$_POST["emppass"];
    $phone=$_POST["phone"];
    $cpassword=$_POST["cemppass"];
   
    
    $conn=mysqli_connect("localhost","root","","leavesys");

    $sql = "INSERT INTO employees (
    empcode, empgender, empdob, empfname, emplname,
    department_id, address, email, city, country,
    password, phone) VALUES (
    '$empcode', '$empgender', '$empdob', '$empfname', '$emplname',
    '$departments', '$address', '$email', '$city', '$country',
    '$password', '$phone')";
     
     if(empty($empcode) || empty($empgender) || empty($empdob) || empty($empfname) || empty($emplname) || empty($departments) || empty($address) || empty($email) || empty($city) || empty($country) || empty($password) || empty($phone)){
        $_SESSION['error'] = "empty field!";
        header("Location: emp_add.php");
        exit();
     }

     if($password == $cpassword ){
         $run=mysqli_query($conn,$sql);
     }else{
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

$conn=mysqli_connect("localhost","root","","leavesys");
$sql_dep="SELECT id, deptname FROM department";
$result=$conn->query($sql_dep);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">

    <title>Dashboard Template · Bootstrap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    body {
        font-size: .875rem;
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /* Sidebar*/

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 48px 0 0;
        /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /*Navbar*/
    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }

    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

    .form-select:focus {
        border: none !important;
        box-shadow: none !important;
    }

    .chevron {
        font-size: 0.7rem;
        transition: transform 0.3s ease;
    }

    .rotate {
        transform: rotate(180deg);
    }

    .user-img {
        width: 50px;
        height: 50px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .admin {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .cards {
        margin-bottom: 5px;
    }

    /* .main{
        background-color: #f4f4f4;
    } */
    input,
    select {
        border-radius: 0 !important;
        border-bottom-color: gray !important;
        border-left: none !important;
        border-right: none !important;
        border-top: none !important;
    }
    </style>

</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"> Leave Management System</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <?php
            include("../include/sidebar.php");
           ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 d-flex align-items-start flex-column">
                <h3 class="text-center mt-4  d-inline-block">Add Employee</h3>


                <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success border">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
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
                                        while($data=$result->fetch_assoc()){
                                            echo "<option>" . $data["id"] . " " . $data['deptname'] ."</option>";
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


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggles = [{
                toggle: "deptToggle",
                dropdown: "deptDropdown",
                chevron: "deptChevron"
            },
            {
                toggle: "EmpToggle",
                dropdown: "EmpDropdown",
                chevron: "EmpChevron"
            },
            {
                toggle: "levToggle",
                dropdown: "levDropdown",
                chevron: "levChevron"
            },
            {
                toggle: "lmToggle",
                dropdown: "lmDropdown",
                chevron: "lmChevron"
            }
        ];

        toggles.forEach(item => {
            const toggleEl = document.getElementById(item.toggle);
            const dropdownEl = document.getElementById(item.dropdown);
            const chevronEl = document.getElementById(item.chevron);

            toggleEl.addEventListener("click", function(e) {
                e.preventDefault();
                const isOpen = dropdownEl.style.display === "block";
                dropdownEl.style.display = isOpen ? "none" : "block";
                chevronEl.classList.toggle("rotate", !isOpen);
            });
        });

        feather.replace(); // Initialize feather icons if you're using them
    });
    </script>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-DBjhmceckmzwrnMMrjI7BvG2FmRuxQVaTfFYHgfnrdfqMhxKt445b7j3KBQLolRl" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
        integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>