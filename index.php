<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
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
            <form action="login.php" method="post">
                <div class="form-content">
                    <div class="login-form">
                        <div class="title">Login</div>
                        <div class="input-boxs">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" id="" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="" placeholder="Enter your password" required>
                            </div>
                            <div class="text"><a href="register.php">Forgot password?</a></div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Login">
                            </div>
                            <div class="text">Don't have an account? <a href="register.php">Signup now</a></div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </body>

</html>