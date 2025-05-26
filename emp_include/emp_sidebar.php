 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="container-fluid admin text-center py-3 bg-secondary">
                    <div class="user-img bg-light border rounded-circle ">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <p class="text-light">
                        <?php echo $_SESSION["name"]; ?>
                    </p>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../Employee/dashboard.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                          <a href="emp_profile.php?id=<?php  echo $_SESSION["id"]; ?>" class="nav-link">My profile</a>
                        </li>
                        <li class="nav-item">
                          <a href="change_pass.php" class="nav-link">Change Passsword</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link d-flex justify-content-between align-items-center"
                                id="levToggle">
                                <span><span data-feather="folder"></span> Leaves</span>
                                <span id="levChevron" class="chevron">&#x25BC;</span>
                            </a>
                            <ul class="nav flex-column " id="levDropdown" style="display: none;">
                                <li class="nav-item ">
                                    <a href="apply_lev.php" class="nav-link text-secondary">- Apply Leaves</a>
                                </li>
                                <li class="nav-item">
                                    <a href="manage_leaves.php" class="nav-link text-secondary">- Leaves History</a>
                                </li>
                            </ul>
                        </li>
                       

                        </li>



                </div>
            </nav>