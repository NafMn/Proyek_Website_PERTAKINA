<?php

    $hostname = "localhost";
    $db_id = "root";
    $db_pw  = "";
    $db_name    ="lms_pertakina";

    $connect = mysqli_connect($hostname, $db_id, $db_pw, $db_name);

    try {
        if (!$connect) {
            throw new Exception("Koneksi database gagal: " . mysqli_connect_error());
        } else {
        }
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }

?>