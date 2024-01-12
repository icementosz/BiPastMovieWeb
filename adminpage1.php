<?php 
    session_start();
    if ($_SESSION['userlevel'] != 'a') {
      header("Location: index.php");
    }
    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }

    include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin - User</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="admincss/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Are you sure to Delete?');
        }
        </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="adminpage.php">BiPast Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="adminpage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="adminpage1.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link collapsed" href="adminpage2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-rectangle-list"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="adminpage3.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Type
                            </a>
                            <a class="nav-link" href="adminpage4.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-clapperboard"></i></div>
                                Movie
                            </a>
                            <a class="nav-link" href="userpage.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-to-bracket"></i></div>
                                Go Movie Page
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin <?php echo $_SESSION['user']?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All User</h1>
                        <div class="container">
                            <br>
                            <a href="adduser.php"><button class="btn btn-success my-1" type="submit">Add User</button></a>
                           
                            <br>
                            <br>
                            <table id="datatableuser" class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">UserLevel</th>
                                    <th scope="col">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result=mysqli_query($conn,"SELECT * FROM user ORDER BY userlevel ASC");
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                                $id=$row['id'];
                                                $name=$row['name'];
                                                $email=$row['email'];
                                                $password=$row['password'];
                                                $userlevel=$row['userlevel'];
                                                echo '<tr>
                                                <th scope="row">'.$name.'</th>
                                                <td>'.$email.'</td>
                                                <td>'.$password.'</td>
                                                <td>'.$userlevel.'</td>
                                                <td>
                                                <a href="updateuser.php?id='.$id.'"><button class="btn btn-primary btn-sm" type="submit">Update</button></a>
                                                <a href="deleteuserdb.php?id='.$id.'" onclick="return checkDelete()"><button class="btn btn-danger btn-sm" type="submit">Delete</button></a>
                                                
                                                </td>
                                                </tr>';
                                            }
                                        }
                                    ?>
                                    
                                    
                                </tbody>
                                </table>
                        </div>
                    </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatableuser').DataTable();
            } );
        </script>

        
    </body>
</html>
