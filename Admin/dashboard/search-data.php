<?php
session_start();
include "../config/database/database.php";

// Default SQL query
$sql = "SELECT * FROM vidio ORDER BY id_vidio DESC";

// If search keyword is submitted
if (isset($_POST['search_button'])) {
    // Get the search keyword
    $search_keyword = $_POST['search_keyword'];

    // Modify the SQL query to include search functionality
    $sql = "SELECT * FROM vidio WHERE judul_vidio LIKE '%$search_keyword%' OR kategori_vidio LIKE '%$search_keyword%' ORDER BY id_vidio DESC";
}

// Execute the SQL query
$result = $connect->query($sql);
