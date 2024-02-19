<?php require "../include/head.php"; ?>
<?php require "../include/nav.php"; ?>

<!-- Begin Page Content -->
<?php
// Tampilkan isi dari $_POST
var_dump($_POST);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pastikan semua input telah diisi dengan benar sebelum memproses
  if (!empty($_POST['url_video']) && !empty($_POST['judul_video']) && !empty($_POST['kategori_video']) && !empty($_POST['durasi_video']) && !empty($_POST['sinopsis_video']) && !empty($_POST['deskripsi_video']) && !empty($_FILES['img_thumbnail']['name'])) {
    // Tangkap data dari form
    $url_video = $_POST['url_video'];
    $judul_video = $_POST['judul_video'];
    $kategori_video = $_POST['kategori_video'];
    $durasi_video = $_POST['durasi_video'];
    $sinopsis_video = $_POST['sinopsis_video'];
    $deskripsi_video = $_POST['deskripsi_video'];

    // Mengatur direktori untuk menyimpan gambar
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["img_thumbnail"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check apakah file gambar nyata gambar
    $check = getimagesize($_FILES["img_thumbnail"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    // Check jika file sudah ada
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check ukuran file
    if ($_FILES["img_thumbnail"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check jika $uploadOk bernilai 0 karena ada kesalahan
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // Jika semua sudah benar, coba upload file
    } else {
      if (move_uploaded_file($_FILES["img_thumbnail"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["img_thumbnail"]["name"])). " has been uploaded.";
        // Buat pernyataan SQL untuk video
        $sql = "INSERT INTO vidio (url_vidio, judul_vidio, durasi_vidio, sinopsis_vidio, deskripsi_vidio, img_thumbnail, kategori_video)
        VALUES ('$url_video', '$judul_video', '$durasi_video', '$sinopsis_video', '$deskripsi_video', '$target_file', '$kategori_video')";
      
        // Eksekusi pernyataan SQL untuk video
        if ($connect->query($sql) === TRUE) {
          echo "<script>alert('Data berhasil dibuat.'); window.location.href='index.php';</script>";
        } else {
          echo "<script>alert('Terjadi kesalahan: " . $connect->error . "');</script>";
        }
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    echo "<script>alert('Semua Kolom harus diisi');</script>";
  }
}
?>
<div class="container-fluid pb-4">
  <div class="card shadow">
    <div class="card-header">
      <h3 class="text-center py-2">FORM EDIT DATA</h3>
    </div>
    <form class="px-5 pt-4 pb-5" method="POST" action="" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12 col-md-6">
          <label for="url_video" class="form-label">URL VIDEO</label>
          <input type="text" class="form-control" id="url_video" name="url_video" value="<?php echo isset($url_video) ? $url_video : ''; ?>" aria-describedby="emailHelp" />
        </div>
        <div class="col-12 col-md-6">
          <label for="judul_video" class="form-label">JUDUL VIDEO</label>
          <input type="text" class="form-control" id="judul_video" name="judul_video" value="<?php echo isset($judul_video) ? $judul_video : ''; ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 mt-2">
          <select class="form-control selectpicker" name="kategori_video" id="kategori_video">
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="Bahasa Jepang">Bahasa Jepang</option>
            <option value="Bahasa Korea">Bahasa Korea</option>
          </select>
        </div>
        <div class="col-12 col-md-6">
          <label for="durasi_video" class="form-label">DURASI VIDEO</label>
          <input type="text" class="form-control" id="durasi_video" name="durasi_video" value="<?php echo isset($durasi_video) ? $durasi_video : ''; ?>" />
        </div>
      </div>
      <div class="col-12 p-0 m-0">
        <div class="mb-3">
          <label for="sinopsis_video" class="form-label">SINOPSIS VIDEO</label>
          <textarea class="form-control" id="sinopsis_video" name="sinopsis_video" maxlength="100"><?php echo isset($sinopsis_video) ? $sinopsis_video : ''; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="deskripsi_video" class="form-label">DESKRIPSI VIDEO</label>
          <textarea class="form-control" id="deskripsi_video" name="deskripsi_video" maxlength="100"><?php echo isset($deskripsi_video) ? $deskripsi_video : ''; ?></textarea>
        </div>
      </div>
      <div class="row">
        <label class="form-label" for="customFile">Uplout gambar gan</label>
        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail" />
      </div>
      <div class="row mt-2">
        <button type="submit" class="btn btn-danger ml-2" name="simpan">
          <i class="fas fa-plus-circle px-1 text-center"></i> Simpan
        </button>
        <button type="reset" class="btn btn-secondary ml-2">
          <i class="fas fa-undo-alt px-1"></i> Reset
        </button>
      </div>
    </form>
  </div>
</div>


<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Pertakina Bedaya 2024</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Anda yakin ingin Keluar?
        </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Anda Ingin Keluar.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">
          Batal
        </button>
        <a class="btn btn-danger" href="login.html">Keluar</a>
      </div>
    </div>
  </div>
</div>
<?php include './include/footer.php' ?>