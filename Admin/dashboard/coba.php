<?php
include '../include/nav.php';


// Ambil nama file thumbnail dari database
$sql = "SELECT img_thumbnail FROM vidio"; // Ganti '$id_video' dengan ID video yang sesuai
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        $thumbnail_path = "./uploads/" . $row["img_thumbnail"];
        echo "<img src='$thumbnail_path' alt='Thumbnail'>";
    }
} else {
    echo "Tidak ada gambar yang ditemukan.";
}
?>
