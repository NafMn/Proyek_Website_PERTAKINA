<?php
    // mengaktifkan session
    session_start();

    // meenghapus semua session
    session_destroy();

    // mengalihkan halaman sambil mengirim pesan logout
    header("location: ./login.php?pesan=logout");

?>