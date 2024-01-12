<?php 
    session_start();

    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {
    include('connection.php');
    $idmovie = $_GET['id'];
    $iduser=$_SESSION['userid'];
    $query=mysqli_query($conn,"SELECT * FROM data_movie WHERE id =$idmovie");
    $result=mysqli_fetch_array($query);
    
    if (isset($_POST['liked'])) {
		$idmoviez = $_POST['idmoviez'];
		$result = mysqli_query($conn, "SELECT * FROM data_movie WHERE id=$idmoviez");
		$row = mysqli_fetch_array($result);
		$n = $row['totallikes'];

		mysqli_query($conn, "INSERT INTO data_likes (id_user, id_movie) VALUES ($iduser, $idmoviez)");
		mysqli_query($conn, "UPDATE data_movie SET totallikes=$n+1 WHERE id=$idmoviez");

		echo $n+1;
		exit();
	}
	if (isset($_POST['unliked'])) {
		$idmoviez = $_POST['idmoviez'];
		$result = mysqli_query($conn, "SELECT * FROM data_movie WHERE id=$idmoviez");
		$row = mysqli_fetch_array($result);
		$n = $row['totallikes'];

		mysqli_query($conn, "DELETE FROM data_likes WHERE id_movie=$idmoviez AND id_user=$iduser");
		mysqli_query($conn, "UPDATE data_movie SET totallikes=$n-1 WHERE id=$idmoviez");
		
		echo $n-1;
		exit();
	}
    if (isset($_POST['playlist'])) {
		$idmoviez = $_POST['idmoviez'];

		mysqli_query($conn, "INSERT INTO data_playlist (id_user, id_movie) VALUES ($iduser, $idmoviez)");
		exit();
	}
    if (isset($_POST['unplaylist'])) {
		$idmoviez = $_POST['idmoviez'];

		mysqli_query($conn, "DELETE FROM data_playlist WHERE id_movie=$idmoviez AND id_user=$iduser");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$result['name']?></title>
    <link rel="stylesheet" href="playpagestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/da9752b244.js" crossorigin="anonymous"></script>
</head>
<style>
.playlist, .unplaylist{
	color: #D06E66;
}
.like, .unlike, .likes_count {
	color: #3792B8;
}
.hide {
	display: none;
}
.hidez {
	display: none;
}
.fa-thumbs-up, .fa-thumbs-o-up {
	font-size: 2.5em;
}
.fa-plus-square, .fa-plus-square-o{
    font-size: 2.7em;
}
.blocktext{
    margin-left: auto;
    margin-right: auto;
    width: 50em;
}
</style>
<body>
<div class="main-movie">
      <div class="title-box-movie">
        <div class="h1-text">
          <h1><?=$result['name']?></h1>
        </div>
      </div>
      </div>
    <div class="movie-description">
      <div class="card">
        <img src="<?=$result['img']?>">
       </div><br><br>
       <div class="info">
        <h1><?=$result['name']?></h1>
            <p class="blocktext"><?=$result['detail']?></p>
        <div class="span-li">
          <span>
            <span class="meta-data">หนังปี <?=$result['year']?> </span><br>
            <span class="meta-data">ความยาว <?=$result['minute']?> นาที</span>
            </span> 
        </div>
        </div>
        </div>
        <br>
        <br>
        <div class="container col-md-2 clearfix">
            <?php
                $userid=$_SESSION['userid'];
                $resultcheck=mysqli_query($conn,"SELECT * FROM data_likes WHERE id_user=$userid AND id_movie=$idmovie");
                if(mysqli_num_rows($resultcheck)==1){ 
                    ?>
					<span class="unlike fa fa-thumbs-up" data-id="<?php echo $idmovie; ?>"></span> 
					<span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $idmovie; ?>"></span> 
                    <?php 
                } else { 
                    ?>
					<span class="like fa fa-thumbs-o-up" data-id="<?php echo $idmovie; ?>"></span> 
					<span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $idmovie; ?>"></span> 
                <?php } ?>
            <?php ?>

            <?php
                $userid=$_SESSION['userid'];
                $resultcheck1=mysqli_query($conn,"SELECT * FROM data_playlist WHERE id_user=$userid AND id_movie=$idmovie");
                if(mysqli_num_rows($resultcheck1)==1){ 
                    ?>
					<span class="unplaylist fa fa-plus-square" data-id="<?php echo $idmovie; ?>"></span> 
					<span class="playlist hidez fa fa-plus-square-o" data-id="<?php echo $idmovie; ?>"></span> 
                    <?php 
                } else { 
                    ?>
					<span class="playlist fa fa-plus-square-o" data-id="<?php echo $idmovie; ?>"></span> 
					<span class="unplaylist hidez fa fa-plus-square" data-id="<?php echo $idmovie; ?>"></span> 
            <?php } ?>
            <?php ?>
        </div><br>
       <div class="h2-text">
        <h4>
          ตัวอย่าง : <?=$result['name']?>
        </h4>
        <div class="informs-movie">
            <div class="img-movie">
                <div class="box-title">
                    <div class="rll-youtube-player">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$result['vdo_ex']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        <div>
        <div class="h2-text">
        <h4>
            ดูหนังเรื่อง : <?=$result['name']?>
        </h4>
        <div class="informs-movie">
            <div class="img-movie">
                <div class="box-title">
                    <div class="rll-youtube-player">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$result['vdo_main']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        <div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // when the user clicks on like
            $('.like').on('click', function(){
                var idmoviez = $(this).data('id');
                    $post = $(this);

                $.ajax({
                    url: 'playpage.php?id=<?=$result['id']?>',
                    type: 'post',
                    data: {
                        'liked': 1,
                        'idmoviez': idmoviez
                    },
                    success: function(response){
                        $post.parent().find('span.likes_count').text(response + " likes");
                        $post.addClass('hide');
                        $post.siblings().removeClass('hide');
                    }
                });
            });

            // when the user clicks on unlike
            $('.unlike').on('click', function(){
                var idmoviez = $(this).data('id');
                $post = $(this);

                $.ajax({
                    url: 'playpage.php?id=<?=$result['id']?>',
                    type: 'post',
                    data: {
                        'unliked': 1,
                        'idmoviez': idmoviez
                    },
                    success: function(response){
                        $post.parent().find('span.likes_count').text(response + " likes");
                        $post.addClass('hide');
                        $post.siblings().removeClass('hide');
                    }
                });
            });

            // when the user clicks on playlist
            $('.playlist').on('click', function(){
                var idmoviez = $(this).data('id');
                $post = $(this);

                $.ajax({
                    url: 'playpage.php?id=<?=$result['id']?>',
                    type: 'post',
                    data: {
                        'playlist': 1,
                        'idmoviez': idmoviez
                    },
                    success: function(response){
                        $post.addClass('hidez');
                        $post.siblings().removeClass('hidez');
                    }
                });
            });

            // when the user clicks on unplaylist
            $('.unplaylist').on('click', function(){
                var idmoviez = $(this).data('id');
                $post = $(this);

                $.ajax({
                    url: 'playpage.php?id=<?=$result['id']?>',
                    type: 'post',
                    data: {
                        'unplaylist': 1,
                        'idmoviez': idmoviez
                    },
                    success: function(response){
                        $post.addClass('hidez');
                        $post.siblings().removeClass('hidez');
                    }
                });
            });
        });
    </script>
<?php } ?>
</body>
</html>