<?php 
    session_start();
    include "../config/database/database.php";

    $identifier = $_POST['username']; 
    $password = $_POST['password'];



    $query = "SELECT * FROM `admin` WHERE username = '$identifier'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    
        
        if ($password === $user['password']) { // Verifikasi password yg dihash
            // Jika password cocok, set session

            $_SESSION['username'] = $identifier;
            $_SESSION['status'] = "Login";
            header("location: index.php");
        } else {
            header("location: ./Login.php?pesan=password_salah");
        }
    } else {
        header("location: ./Login.php?pesan=gagal");
    }
?>


