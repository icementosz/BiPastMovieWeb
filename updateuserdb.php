<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        
        session_start();
        $id = $_SESSION['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userlevel = $_POST['userlevel'];

        $sql="UPDATE user SET
        name='$name',
        email='$email',
        password='$password',
        userlevel='$userlevel'
        
        WHERE id=$id
        ";

        $query1=mysqli_query($conn,$sql);
        echo "<script>";
        echo "alert('แก้ไขข้อมูลเรียบร้อย');";
        echo "window.location = 'adminpage1.php';";
        echo "</script>";
    }
?>