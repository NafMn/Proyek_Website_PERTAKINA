<?php
spl_autoload_register(function ($class_name) {
    $directories = array(
        'classes/', // Sesuaikan dengan lokasi kelas Anda
        'models/'   // Sesuaikan dengan lokasi model Anda
    );

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load database connection
require_once 'database.php'; // Sesuaikan dengan lokasi file database.php Anda
?>