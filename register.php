<?php 

    session_start();

    require_once "connection.php";

    if (isset($_POST['submit'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['email'] === $email){
            echo "<script>alert('Email already exists');</script>";
        } else {
            $query = "INSERT INTO user (name,email,password,userlevel)
                        VALUE ('$name','$email','$password','m')";
            $result = $result = mysqli_query($conn, $query);

            if ($result){
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                header("Location: index.php");
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>

    <!-- Fontasesome CDN Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <link rel="stylesheet" href="loginpage.css">
</head>

    <body>

        <div class="container">
            <div class="cover">
                <div class="img">
                    <img src="images\bipastlogo1.png" alt="">
                </div>
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Register</div>
                        <div class="input-boxs">
                            <div class="input-box">
                                <i class="fas fa-male"></i>
                                <input type="text" name="name" id="" placeholder="Enter your name" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" id="" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="" placeholder="Enter your password" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Submit">
                            </div>
                            <div class="text">Already have an account? <a href="index.php">Login now</a></div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </body>

</html>