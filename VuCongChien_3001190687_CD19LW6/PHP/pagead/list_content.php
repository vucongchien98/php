<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
    <?
    session_start();
    include './connect_db.php';
    include './function.php'
    ?>
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="" style="padding: 100px">
                                <?php   
                                    session_start();
                                    include './connect_db.php';
                                    $error = false;
                                    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                                        $result = mysqli_query($con, "Select `id`,`username`,`fullname`,`birthday` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = MD5('" . $_POST['password'] . "'))");
                                        if (!$result) {
                                            $error = mysqli_error($con);
                                        } else {
                                            $user = mysqli_fetch_assoc($result);
                                            $_SESSION['current_user'] = $user;
                                        }
                                        mysqli_close($con);
                                        if ($error !== false || $result-> num_rows == 0) {
                                            ?>
                                            <div id="login-notify" class="box-content">
                                                <h1>Th??ng b??o</h1>
                                                <h4><?= !empty($error) ? $error : "Th??ng tin ????ng nh???p kh??ng ch??nh x??c" ?></h4>
                                                <a href="./login.php">Quay l???i</a>
                                            </div>
                                            <?php
                                            exit;
                                        }
                                        ?>
                                    <?php } ?>
                                    <?php if (empty($_SESSION['current_user'])) { ?>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">????ng Nh???p</h3></div>
                                    <div class="card-body">
                                        <form action="./index.php" method="Post" autocomplete="off">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="username" />
                                                <label>T??i kho???n</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" placeholder="Password" name="password" />
                                                <label>M???t kh???u</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Nh??? m???t kh???u</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Qu??n m???t kh???u</a>
                                                <input type="submit" value="????ng nh???p">
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                            
                                    <?
    include './connect_db.php';
    $result = mysqli_query($con, "SELECT * FROM content");
    mysqli_close($con);
    ?>
     <div id="user-info">
            <h2 class="justify-content-center">Danh s??ch b??i vi???t</h2>
            <a href="./upload.php" class="btn btn-danger" style="margin-bottom: 5px;">t???o b??i vi???t m???i</a>
            <table class="table table-bordered border-primary" style="width:700px;">
                
                <tr>
                    <th>id</th>
                    <th>T??n m??o</th>
                    <th>???nh</th>
                    <th>X??a</th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td width="20%"><?= $row['mssv'] ?></td>
                    <td width="30%"><?= $row['hoten'] ?></td>
                    <td><img class="img-fluid" src="<?= $row['hinhanh'] ?>"></td>
                    <td width="10%"><a href="delete_ct.php?mssv= <?= $row['mssv'] ?>">X??a</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Page</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        
                            <div class="sb-sidenav-menu-heading">User</div>
                            <?php if (empty($_SESSION['current_user'])) { ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <?php } else {
                                $currentUser = $_SESSION['current_user'];
                            ?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <?= $currentUser['fullname'] ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="logout.php">????ng xu???t</a>
                                </nav>
                            </div>
                            <?php } ?>
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="list_content.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Qu???n l?? b??i vi???t
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Qu???n l?? t??i kho???n
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="list_admin.php">List admin user</a>
                                    <a class="nav-link" href="list_client.php">List client user</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            
                            <a class="nav-link" href="upload.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Upload b??i vi???t
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
