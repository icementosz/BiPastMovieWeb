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
    $query=mysqli_query($conn,"SELECT * FROM user WHERE id = $id");
    $result=mysqli_fetch_array($query);
    $_SESSION['id']= $result['id'];

    
?>
<!DOCTYPE html>
<html lang="en">
<style>
  .container{
    margin: 150px auto;
    background: #fff;
    position: relative;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Admin - Updateuser</title>
</head>
<body>
    <form action="updateuserdb.php" method="post">
        <div class="container">
            <h1>Update User</h1>
            <br>
            <div class="form-group">
                <label>Name</label>
                <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name" value="<?= $result['name']?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?= $result['email']?>" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="" name="password" class="form-control" id="" placeholder="Password" value="<?= $result['password']?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">User Level</label>
                <select name="userlevel" class="form-control" id="exampleFormControlSelect1" required>
                    <option>Select Option</option>
                    <option value='m'<?=$result['userlevel'] == 'm' ? ' selected="selected"' : '';?>>m</option>
                    <option value='a'<?=$result['userlevel'] == 'a' ? ' selected="selected"' : '';?>>a</option>
                </select>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button style="margin-left:5px;" type="cancel" class="btn btn-danger" onclick="window.location.replace('adminpage1.php');return false;">Cancel</button>
        </div>
    </form>
</body>
</html>