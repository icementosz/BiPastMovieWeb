<?php
    session_start();
    if ($_SESSION['userlevel'] != 'a') {
      header("Location: index.php");
    }
    if (!$_SESSION['userid']) {
        header("Location: index.php");
    }
    
    include('connection.php');
    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userlevel = $_POST['userlevel'];

        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if (isset($user['email'])){
            echo "<script>alert('Email already exists');</script>";
        } else {
            $query = "INSERT INTO user (name,email,password,userlevel)
                        VALUE ('$name','$email','$password','$userlevel')";
            $result = mysqli_query($conn, $query);

            if ($result){
                echo "<script>";
                    echo "alert('เพิ่ม User เรียบร้อย');";
                    echo "window.location = 'adminpage1.php';";
                echo "</script>";
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }
    }

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
    <title>Admin - Adduser</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container">
            <h1>Add User</h1>
            <br>
            <div class="form-group">
                <label>Name</label>
                <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">User Level</label>
                <select name="userlevel" class="form-control" id="exampleFormControlSelect1" required>
                    <option>Select Option</option>
                    <option value='m'>m</option>
                    <option value='a'>a</option>
                </select>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button style="margin-left:5px;" type="cancel" class="btn btn-danger" onclick="window.location.replace('adminpage1.php')">Cancel</button>
        </div>
    </form>
            
</body>
</html>