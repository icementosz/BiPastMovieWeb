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
<html>
<head>
  <title>Admin - Addmovie</title>
  <link rel="stylesheet" href="formaddupdatemovie.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<body>
  
	<div class="container" id="container">
		<div class="form-add">
    <div class="content">
      <form action="addmoviedb.php" method="post">
        <h1 style="text-align:center;">Add Movie data</h1>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Movie Name</span>
            <input type="text" name="name" placeholder="" value=""required>
          </div>
          <div class="input-box">
            <span class="details">Movie Category</span>
            <select name="category" class="form-controlz" required>
              <?php
              $query=mysqli_query($conn,"SELECT * FROM category");
              while($rows=$query->fetch_assoc())
              {   
                  $name_category=$rows['name_category'];
                  $id_category=$rows['id_category'];
                  echo "<option value='$id_category'>$name_category</option>";
              }
              ?>
            </select>
            </div>
          <div class="input-box">
            <span class="details">Movie Type</span>
            <select name="type[]" class="form-control1" multiple required>
              <?php
                $query1=mysqli_query($conn,"SELECT * FROM type");
                if(mysqli_num_rows($query1)>0){
                  foreach($query1 as $rowtype){
                    ?>
                      <option value="<?=$rowtype['id_type'];?>"><?=$rowtype['name_type'];?></option>
                      <?php
                  }
                }
                ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Year</span>
            <input type="number" name="year" placeholder="" value="" required>
        </div>
          <div class="input-box">
            <span class="details">Time (Min)</span>
            <input type="number" name="time" placeholder="" value="" required>
          </div>
          <div class="input-box">
            <span class="details">Details</span>
            <input type="text" name="detailz" placeholder="" value="" required>
          </div>
          <div class="input-box">
            <span class="details">Image Link (ภาพแนวนอน 1920x1080 or 1280x720)</span>
            <input type="text" name="img" placeholder="" value=""required>
        </div>
        <div class="input-box">
          <span class="details">Trailer Movie Link</span>
          <input type="text" name="trailerlink" placeholder="" value=""required>
        </div>
        <div class="input-box">
          <span class="details">Full Movie Link</span>
          <input type="text" name="fullmovielink" placeholder="" value=""required>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Add">
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