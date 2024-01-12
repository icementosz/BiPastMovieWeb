<?php 
    session_start();
    if ($_SESSION['userlevel'] != 'a') {
      header("Location: index.php");
    }
    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }

    include('connection.php');
    $id = $_GET['id'];
    $query=mysqli_query($conn,"SELECT * FROM data_movie WHERE id =$id");
    $result=mysqli_fetch_array($query);
    $_SESSION['movieid']= $result['id'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Updatemovie</title>
  <link rel="stylesheet" href="formaddupdatemovie.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<body>
  
	<div class="container" id="container">
		<div class="form-add">
    <div class="content">
      <form action="updatemoviedb.php" method="post">
        <h1 style="text-align:center;">Update Movie data</h1>
        <div class="user-details">
          <!-- <div class="input-box">
            <span class="details">Movie ID</span>
            <input type="text" name="id" placeholder="" value="<?= $result['id']?>"required>
          </div> -->
          <div class="input-box">
            <span class="details">Movie Name</span>
            <input type="text" name="name" placeholder="" value="<?= $result['name']?>"required>
          </div>
          <div class="input-box">
            <span class="details">Movie Category</span>
            <select name="category" class="form-controlz" required>
              <?php
              $query1=mysqli_query($conn,"SELECT * FROM category");
              while($rows=$query1->fetch_assoc())
              {   
                ?>
                  <option value='<?php echo $rows['id_category'] ?>' <?php if($rows['id_category']==$result['id_categorym']){
                    echo'selected';
                  }?>> 
                  <?php echo $rows['name_category']; ?></option>
                <?php
                }
                ?>
              </select>
              </div>
            <!-- <input type="text" name="name" placeholder="" value=""required> -->
          <!-- <div class="input-box">
            <span class="details">Short  name</span>
            <input type="text" placeholder="" required>
          </div> -->
          <!-- <div class="input-box">
            <span class="details">Get out data</span>
            <input type="text" placeholder="" required >
          </div> -->
          <!-- <div class="input-box">
            <span class="details">Get in data</span>
            <input type="text" placeholder="" required>
          </div> -->
          <div class="input-box">
            <span class="details">Movie Type</span>
            <?php
                $udtype=mysqli_query($conn,"SELECT id_type FROM nameandtype WHERE id_movie=$id");
                $udt_array=[];
                foreach($udtype as $rowudtype){
                    $udt_array[]=$rowudtype['id_type'];
                }
            ?>
            <select name="type[]" class="form-control1" multiple required>
              <?php
                $query1=mysqli_query($conn,"SELECT * FROM type");
                if(mysqli_num_rows($query1)>0){
                  foreach($query1 as $rowtype){
                    ?>
                      <option value="<?=$rowtype['id_type'];?>"
                        <?php echo in_array($rowtype['id_type'],$udt_array) ? 'selected':''?>
                      >
                        <?=$rowtype['name_type'];?>
                      </option>
                      <?php
                  }
                }
                ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Year</span>
            <input type="number" name="year" placeholder="" value="<?= $result['year']?>"required>
        </div>
          <div class="input-box">
            <span class="details">Time (Min)</span>
            <input type="number" name="time" placeholder="" value="<?= $result['minute']?>"required>
          </div>
          <div class="input-box">
            <span class="details">Details</span>
            <input type="text" name="detailz" placeholder="" value="<?= $result['detail']?>" required>
          </div>
          <!-- <div class="input-box">
            <span class="details">Genreral</span>
            <br><br>
          </div> -->
          <div class="input-box">
            <span class="details">Image Link (ภาพแนวนอน 1920x1080 or 1280x720)</span>
            <input type="text" name="img" placeholder="" value="<?= $result['img']?>"required>
        </div>
        <div class="input-box">
          <span class="details">Trailer Movie Link</span>
          <input type="text" name="trailerlink" placeholder="" value="<?= $result['vdo_ex']?>"required>
        </div>
        <div class="input-box">
          <span class="details">Full Movie Link</span>
          <input type="text" name="fullmovielink" placeholder="" value="<?= $result['vdo_main']?>"required>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Update">
        </div>
      </form>
      <div class="button1">
        <a href="adminpage4.php"><input type="submit" name="cancel" value="Cancel"></a>
        </div>
    </div>
		</div>
      
				</div>
			</div>
		</div>
	</div>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.form-control1').select2();
    });
  </script>
</body>
</html>