<?php 
    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

    include('connection.php');
    $userid=$_SESSION['userid'];

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
  <link rel="stylesheet" href="css/slick.css" />
  <link rel="stylesheet" href="css/slick-theme.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/animate.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/select2.min.css" />
  <link rel="stylesheet" href="css/select2-bootstrap4.min.css" />
  <link rel="stylesheet" href="css/slick-animation.css" />
  <link rel="stylesheet" href="style.css" />
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
                          <form action="searchmovie.php" class="searchbox" method="POST">
                            <div class="form-group position-relative">
                              <input type="text" class="text search-input font-size-12"
                                placeholder="type here to search..." name="searchmovie">
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
                      <form action="searchmovie.php" class="searchbox" method="POST">
                        <div class="form-group position-relative">
                          <input type="text" class="text search-input font-size-12"
                            placeholder="type here to search..." name="searchmovie"/>
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

  <!-- slider starts  -->
  
  <section id="home" class="iq-main-slider p-0">
    <div id="home-slider" class="slider m-0 p-0">
    <?php 
        $query22 = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY totallikes DESC LIMIT 3");
        while($result = mysqli_fetch_array($query22)){
    ?>   
      <div class="slide slick-bg s-bg-1" style="background-image: url(<?=$result['img']?>);">
        <div class="container-fluid position-relative h-100">
          <div class="slider-inner h-100">
            <div class="row align-items-center h--100"> 
              <div class="col-xl-6 col-lg-12 col-md-12">
                <a href="javascript:void(0)">
                  <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                    <img src="images/metflix logo1.png" class="c-logo" alt="" />
                  </div>
                </a>
                <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                  data-delay-in="0.6">
                  <?=$result['name']?>
                </h1>
                <div class="d-flex flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft"
                  style="opacity: 1">
                  <div class="d-flex align-items-center mt-2 mt-md-3">
                    <span class="ml-3"><?=$result['minute']?> minute</span>
                  </div>
                </div>
                <p data-animation-in="fadeInUp">
                  <?=$result['detail']?>
                </p>
                <div class="d-flex align-items-center r-mb-23 mt-4" data-animation-in="fadeInUp" data-delay-in="1.2">
                  <a href="./playpage.php?id=<?=$result['id']?>" class="btn btn-hover iq-button"><i class="fa fa-play mr-3"></i>Play Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </section>
  <!-- slider ends -->

  <!-- main content starts  -->
  <div class="main-content">
    <!-- Newest section starts   -->

    <section id="iq-favorites">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Newest</h4>
              <a href="userpageallmovie.php" class="iq-view-all">View All</a>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item -->
                <?php 
                    $querynewest = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY id DESC LIMIT 9");
                    while($result = mysqli_fetch_array($querynewest)){
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
    </section>

    <!-- Newest section ends -->

    <!-- Popular section starts  -->
    <section id="iq-upcoming-movie">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">Popular Movies</h4>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item -->
                <?php 
                    $querypopular = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY totallikes DESC LIMIT 9");
                    while($result = mysqli_fetch_array($querypopular)){
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
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Popular section ends -->
    
    <!-- Playlist section starts -->
    <section id="iq-suggested" class="s-margin">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 overflow-hidden">
            <div class="iq-main-header d-flex align-items-center justify-content-between">
              <h4 class="main-title">My Playlist</h4>
            </div>
            <div class="favorite-contens">
              <ul class="favorites-slider list-inline row p-0 mb-0">
                <!-- slide item -->
                <?php 
                    $queryplaylist = mysqli_query($conn,"SELECT data_movie.*,data_playlist.* FROM data_movie,data_playlist WHERE
                    data_movie.id=data_playlist.id_movie AND data_playlist.id_user=$userid ORDER BY idplaylist DESC");
                    while($result = mysqli_fetch_array($queryplaylist)){
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
                        <a href="./playpage.php?id=<?=$result['id']?>"><span class="btn btn-hover iq-button">
                          <i class="fa fa-play mr-1"></i>
                          Play Now
                        </span></a>
                      </div>
                    </div>
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

  <!-- main content ends  -->


  <footer class="iq-bg-dark">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row footer-standard">
          <div class="col-lg-5">
            <div class="widget text-left">
              <div class="textwidget">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- js files  -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/slick-animation.min.js"></script>

  <script src="main.js"></script>
</body>
</html>
<?php } ?>