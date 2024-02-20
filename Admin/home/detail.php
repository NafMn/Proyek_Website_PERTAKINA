<html>
<!-- And Header -->
<?php include "./include/header.php" ?>
<?php include "./include/pageTitle.php" ?>

<!-- Main Container-->
<?php
// Start session
// session_start();
$id_vidio = $_GET['id'];
// Cek apakah ID video sudah ada di session
if (isset($id_vidio)) {
  // Ambil ID video dari session
  // $video_id = $_SESSION['vidio'];

  // Lakukan query untuk mendapatkan detail video dari database berdasarkan ID
  // Misalnya:
  $sql_video = "SELECT * FROM vidio WHERE id_vidio = $id_vidio";
  $result_video = $connect->query($sql_video);
  if ($result_video->num_rows > 0) {
    while ($row = $result_video->fetch_assoc()) {
      $url_video = $row['url_vidio'];
      $id_vidio = $row['id_vidio'];
      $kategori_video = $row['kategori_video'];
      $judul_video = $row['judul_vidio'];
      $sinopsis_vidio = $row['sinopsis_vidio'];
      $deskripsi_vidio = $row['deskripsi_vidio'];
    }
  }

  // Jika query berhasil dan mendapatkan data video
  // Anda dapat menampilkan informasi video seperti judul, deskripsi, dll.
  // Misalnya:
  // $judul_video = $row['judul'];
  // $deskripsi_video = $row['deskripsi'];
?>
  <!-- Tampilkan informasi detail video -->
  <div class="container py-5 my-3 px-4">
    <div class="card-vidio shadow-md">
      <div class="card-body mx-2">
        <!-- Embed video -->
        <iframe class="vidio-course mb-4" width="530" height="315" src="<?php echo $url_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <!-- Informasi video -->
        <!-- Contoh: -->
        <p class="category fw-bold"><?php echo $kategori_video; ?></p>
        <h4><?php echo $judul_video; ?></h4>
        <div style="background-color: grey" class="py-1 my-3">
          <p style="color: #fff" class="fs-5 text-center"><?php echo $sinopsis_vidio; ?></p>
        </div>
        <p class="deskripsi-vidio">
          <?php echo $deskripsi_vidio; ?>
        </p>
      </div>
    </div>
  </div>
<?php
} else {
  // Jika ID video tidak ditemukan dalam session
  echo "ID video tidak ditemukan";
}
?>

<!-- End Main container -->

<!-- ################# Footer Starts Here #######################-->
<?php include "./include/footer.php" ?>
<div class="copy">
  <div class="container">
    <p class="text-center">PERTAKINA INDONESIA | Perkumpulan Keluarga TKI dan TKI Purna Copyright © 2024.Developed by Pertakina Dev. All Rights Reserved.</p>
  </div>
</div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/plugins/testimonial/js/owl.carousel.min.js"></script>
<script src="assets/js/typewrite.min.js"></script>
<script src="assets/js/script.js"></script>