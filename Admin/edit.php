<?php require "include/head.php"; ?>
<?php require "include/nav.php"; ?>
<?php
// Tampilkan isi dari $_POST
var_dump($_POST);
?>
<!-- Begin Page Content -->
<?php
// Ambil ID video yang dipilih dari parameter URL
if(isset($_GET['id'])) {
    $id_video = $_GET['id']; 
    // Lakukan query untuk mendapatkan data video berdasarkan ID
    $sql = "SELECT * FROM vidio WHERE id_vidio = $id_video";
    $result = $connect->query($sql);
    if($result->num_rows > 0) {
        // Ambil data video
        $row = $result->fetch_assoc();
        $url_video = $row['url_vidio'];
        $judul_video = $row['judul_vidio'];
        $kategori_video = $row['kategori_video'];
        $durasi_video = $row['durasi_vidio'];
        $sinopsis_video = $row['sinopsis_vidio'];
        $deskripsi_video = $row['deskripsi_vidio'];
    }
    $kategori_options = array('Bahasa Inggris', 'Bahasa Jepang', 'Bahasa Korea');
}

// Proses update data ketika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pastikan semua input telah diisi dengan benar sebelum memproses
  if (!empty($_POST['url_video']) && !empty($_POST['judul_video']) && !empty($_POST['kategori_video']) && !empty($_POST['durasi_video']) && !empty($_POST['sinopsis_video']) && !empty($_POST['deskripsi_video'])) {
    // Tangkap data dari form
    $url_video = $_POST['url_video'];
    $judul_video = $_POST['judul_video'];
    $kategori_video = $_POST['kategori_video'];
    $durasi_video = $_POST['durasi_video'];
    $sinopsis_video = $_POST['sinopsis_video'];
    $deskripsi_video = $_POST['deskripsi_video'];
    $img_thumbnail = $_POST['img_thumbnail'];


    // jek salah yo boss
    // struktrur e database sek kleru
    // Pertama, jalankan pernyataan ALTER TABLE untuk mengubah tipe data kolom
    // Lakukan query untuk memperbarui data di database
    $sql = "UPDATE vidio 
            SET vidio.url_vidio='$url_video', 
                vidio.judul_vidio='$judul_video', 
                vidio.kategori_video='$kategori_video', 
                vidio.durasi_vidio='$durasi_video', 
                vidio.sinopsis_vidio='$sinopsis_video', 
                vidio.deskripsi_vidio='$deskripsi_video',
                vidio.img_thumbnail='$img_thumbnail' 
            WHERE vidio.id_vidio=$id_video";

      if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui.');</script>";
      } else {
        echo "<script>alert('Terjadi kesalahan: ');</script>" . $connect->error;
      }
      } else {
        echo "<script>alert('Semua Kolom harus diisi: ');</script>" . $connect->error;
  }
}
?>
<div class="container-fluid pb-4">
  <div class="card shadow">
    <div class="card-header">
      <h3 class="text-center py-2">FORM EDIT DATA</h3>
    </div>
    <form class="px-5 pt-4 pb-5" method="POST" action="">
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
        <div class="col-12 col-md-6">
        <label for="kategori_video">Pilih Kategori Video:</label>
        <select class="form-control selectpicker" name="kategori_video" id="kategori_video">
        <?php
          // Loop melalui opsi dan tandai yang dipilih sesuai dengan nilai yang diambil dari database
          foreach ($kategori_options as $option) {
              $selected = ($option == $kategori_video) ? 'selected' : '';
              echo "<option value=\"$option\" $selected>$option</option>";
          }
          ?>
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
          <textarea class="form-control" id="sinopsis_video" maxlength="100" name="sinopsis_video"><?php echo isset($sinopsis_video) ? $sinopsis_video : ''; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="deskripsi_video" class="form-label">DESKRIPSI VIDEO</label>
          <textarea class="form-control" id="deskripsi_video" maxlength="100" name="deskripsi_video"><?php echo isset($deskripsi_video) ? $deskripsi_video : ''; ?></textarea>
        </div>
      </div>

      <div class="row">
      <label class="form-label" for="customFile">Uplout gambar gan</label>
      <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail" />
      </div> 

      <button type="submit" class="btn btn-danger">
        <i class="fas fa-plus-circle px-1 text-center"></i> Simpan
      </button>
      <button type="submit" class="btn btn-secondary">
        <i class="fas fa-undo-alt px-1"></i>
        Reset
      </button>
    </form>
  </div>
</div>
</div>

<!-- End of Main Content -->

<?php include "include/footer.php"; ?>