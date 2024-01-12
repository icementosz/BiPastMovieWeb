<?php 
    session_start();

    if (isset($_POST['submit'])) {

        include('connection.php');

        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['name'];
            $_SESSION['userlevel'] = $row['userlevel'];


            if ($_SESSION['userlevel'] == 'a') {
                header("Location: adminpage.php");
            }

            if ($_SESSION['userlevel'] == 'm') {
                header("Location: userpage.php");
            }
        } else {
            echo "<script>";
                echo "alert('User หรือ Password ไม่ถูกต้อง');";
                echo "window.history.back()";
            echo "</script>";
        }

    } else {
        header("Location: index.php");
    }


?>