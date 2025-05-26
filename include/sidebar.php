
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="container-fluid admin text-center py-3 bg-secondary">
                    <div class="user-img bg-light border rounded-circle ">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <p class="text-light">
                       
                    </p>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex justify-content-between align-items-center"
                                id="deptToggle">
                                <span><span data-feather="folder"></span> Department</span>
                                <span id="deptChevron" class="chevron">&#x25BC;</span>
                            </a>
                            <ul class="nav flex-column " id="deptDropdown" style="display: none;">
                                <li class="nav-item ">
                                    <a href="add_dept.php" class="nav-link text-secondary">- Add Department</a>
                                </li>
                                <li class="nav-item">
                                    <a href="mang_dept.php" class="nav-link text-secondary">- Manage Department</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex justify-content-between align-items-center"
                                id="EmpToggle">
                                <span><span data-feather="folder"></span> Employees</span>
                                <span id="EmpChevron" class="chevron">&#x25BC;</span>
                            </a>
                            <ul class="nav flex-column " id="EmpDropdown" style="display: none;">
                                <li class="nav-item ">
                                    <a href="emp_add.php" class="nav-link text-secondary">- Add Employees</a>
                                </li>
                                <li class="nav-item">
                                    <a href="emp_manag.php" class="nav-link text-secondary">- Manage Employees</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex justify-content-between align-items-center"
                                id="levToggle">
                                <span><span data-feather="folder"></span> Leave Type</span>
                                <span id="levChevron" class="chevron">&#x25BC;</span>
                            </a>
                            <ul class="nav flex-column " id="levDropdown" style="display: none;">
                                <li class="nav-item ">
                                    <a href="lev_add.php" class="nav-link text-secondary">- Add Leave Type</a>
                                </li>
                                <li class="nav-item">
                                    <a href="lev_manag.php" class="nav-link text-secondary">- Manage Leave Type</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex justify-content-between align-items-center"
                                id="lmToggle">
                                <span><span data-feather="folder"></span> Leave Managment</span>
                                <span id="lmChevron" class="chevron">&#x25BC;</span>
                            </a>
                            <ul class="nav flex-column " id="lmDropdown" style="display: none;">
                                <li class="nav-item ">
                                    <a href="pending_leaves.php" class="nav-link text-secondary">- Pendin Leaves</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">- Approved Leaves</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-secondary">- Rejected Leaves</a>
                                </li>
                            </ul>
                        </li>

                        </li>



                </div>
            </nav>