<?php 
    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

    include('connection.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ฺBipast Movie</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- i will provide this in description  -->
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/slick-theme.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/select2.min.css" />
  <link rel="stylesheet" href="css/select2-bootstrap4.min.css" />

  <link rel="stylesheet" href="css/slick-animation.css" />
  <link rel="stylesheet" href="userstyle.css">
</head>

<body>
  <header id="main-header">
    <div class="main-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
              <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="navbar-toggler-icon" data-toggle="collapse">
                  <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                  <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                  <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                </div>
              </a>
              <a href="userpage.php" class="navbar-brand">
                <img src="images/metflix logo1.png" class="img-fluid logo" alt="" />
              </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="menu-main-menu-container">
                  <ul id="top-menu" class="navbar-nav ml-auto">
                    <li class="menu-item"><a href="userpage.php">หน้าหลัก</a></li>
                    <li class="menu-item"><a href="#">หมวดหมู่</a>
                    <?php
                        $queryctg = mysqli_query($conn,"SELECT * FROM category ORDER BY id_category ASC");
                    ?>
                      <ul class="sub-menu">
                      <?php while($rowctg=mysqli_fetch_array($queryctg)){?>
                        <li><a class="menu-item" href="./showcategory.php?id=<?=$rowctg['id_category']?>"><?php echo $rowctg['name_category']; ?></a></li>
                      <?php } ?>
                          </ul></li>

                    <li class="menu-item"><a href="#">ประเภท</a>
                    <?php
                        $querytype = mysqli_query($conn,"SELECT * FROM type ORDER BY id_type ASC");
                    ?>
                      <ul class="sub-menu">
                      <?php while($rowtype=mysqli_fetch_array($querytype)){?>
                        <li><a class="menu-item" href="./showtype.php?id=<?=$rowtype['id_type']?>"><?php echo $rowtype['name_type']; ?></a></li>
                      <?php } ?>
                        </ul></li>
                  </ul>
                </div>
              </div>
              <div class="mobile-more-menu">
                <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton" data-toggle="more-toggle"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-h"></i>
                </a>
                <div class="more-menu" aria-labelledby="dropdownMenuButton">
                  <div class="navbar-right position-relative">
                    <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                      <li>
                        <a href="#" class="search-toggle">
                          <i class="fa fa-search"></i>
                        </a>
                        <div class="search-box iq-search-bar">
                          <form action="#" class="searchbox">
                            <div class="form-group position-relative">
                              <input type="text" class="text search-input font-size-12"
                                placeholder="type here to search..." />
                              <i class="search-link fa fa-search"></i>
                            </div>
                          </form>
                        </div>
                      </li>
                      <li>
                        <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center">
                          <img src="images/user/user.png" class="img-fluid user-m rounded-circle" alt="" />
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                          <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 pl-3 pr-3">
                              <a class="iq-sub-card setting-dropdown">
                                <div class="media align-items-center">
                                  <div class="right-icon">
                                    <i class="fa fa-inr text-primary"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                    <h6 class="mb-0"><?php echo $_SESSION['user']?></h6>
                                  </div>
                                </div>
                              <a href="logout.php" class="iq-sub-card setting-dropdown">
                                <div class="media align-items-center">
                                  <div class="right-icon">
                                    <i class="fa fa-sign-out text-primary"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                    <h6 class="mb-0">Logout</h6>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="navbar-right menu-right">
                <ul class="d-flex align-items-center list-inline m-0">
                  <li class="nav-item nav-icon">
                    <a href="#" class="search-toggle device-search">
                      <i class="fa fa-search"></i>
                    </a>
                    <div class="search-box iq-search-bar d-search">
                      <form action="searchmovie.php" class="searchbox">
                        <div class="form-group position-relative">
                          <input type="text" class="text search-input font-size-12"
                            placeholder="type here to search..." name="searchmovie">
                          <i class="search-link fa fa-search"></i>
                        </div>
                      </form>
                    </div>
                  </li>
                  
                  
                  <li class="nav-item nav-icon">
                    <a href="#" class="iq-user-dropdown search-toggle d-flex align-items-center p-0">
                      <img src="images/user/user.png" class="img-fluid user-m rounded-circle" alt="" />
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                      <div class="iq-card shadow-none m-0">
                        <div class="iq-card-body p-0 pl-3 pr-3">
                        <a class="iq-sub-card setting-dropdown">
                            <div class="media align-items-center">
                              <div class="right-icon">
                                <i class="fa fa-inr text-primary"></i>
                              </div>
                              <div class="media-body ml-3">
                                <h6 class="mb-0"><?php echo $_SESSION['user']?></h6>
                              </div>
                            </div>
                          <a href="logout.php" class="iq-sub-card setting-dropdown">
                            <div class="media align-items-center">
                              <div class="right-icon">
                                <i class="fa fa-sign-out text-primary"></i>
                              </div>
                              <div class="media-body ml-3">
                                <h6 class="mb-0">Logout</h6>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
            <div class="nav-overlay"></div>
          </div>
        </div>
      </div>
    </div>
  </header>

 

  <!-- main content starts  -->
  <div class="main-content">
    <!-- Newest section starts   -->
    <br>
    <br>
    <br>
    <br>
    <section id="iq-favorites">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item -->
                <?php 
                    $query = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY id DESC");
                    while($result = mysqli_fetch_array($query)){
                ?>    
                <li class="slide-item">
                  <div class="block-images position-relative">
                    <div class="img-box">
                      <img src="<?=$result['img']?>" class="img-fluid" alt="" />
                    </div>
                    <div class="block-description">
                      <h6 class="iq-title">
                          <?=$result['name']?> 
                      </h6>
                      <div class="movie-time d-flex align-items-center my-2">
                        <span class="text-white"><?=$result['minute']?> Min</span>
                      </div>
                      <div class="hover-buttons">
                          <a href="./playpage.php?id=<?=$result['id']?>" class="btn btn-hover iq-button"><i class="fa fa-play mr-3"></i>Play Now</a>
                      </div>
                    </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <br>
    </section>

    <!-- Newest section ends -->

  <!-- js files  -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/slick-animation.min.js"></script>
  <script src="main.js"></script>
  
</body>
</html>
<?php } ?>