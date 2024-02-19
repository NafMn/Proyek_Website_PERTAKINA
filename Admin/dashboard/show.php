<?php require "../include/head.php"; ?>
<?php require "../include/nav.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="container py-5 my-3 px-4">
        <div class="row">
            <?php
            // Ambil data video dari database
            if(isset($_GET['id'])) {
                $id_video = $_GET['id']; // Ambil ID video dari parameter URL
                // $sql_video = "SELECT * FROM vidio WHERE id_vidio = $id_video";
                $sql_video = "SELECT * FROM vidio WHERE id_vidio = $id_video";
                $result_video = $connect->query($sql_video);
                if ($result_video->num_rows > 0) {
                    $row_video = $result_video->fetch_assoc();
                    $url_video = $row_video['url_vidio']; // Ambil URL video dari baris yang dipilih
            ?>
            <div class="col-12 col-md-6 pb-4">
                <iframe
                    class="vidio-course"
                    width="500"
                    height="315"
                    src="<?php echo $url_video; ?>"
                    title="Video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div class="col-12 col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <p class="text-danger fw-bold"><?php echo $row_video['kategori_video']; ?></p>
                        <h4><?php echo $row_video['judul_vidio']; ?></h4>
                        <div style="background-color: grey" class="py-1 my-3">
                            <p style="color: #fff" class="fs-5 text-center">
                                Deskripsi
                            </p>
                        </div>
                        <p class="deskripsi-vidio">
                            <?php echo $row_video['deskripsi_vidio']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
                } else {
                    echo "<div class='col-12'>Video tidak ditemukan.</div>";
                }
            } else {
                echo "<div class='col-12'>ID video tidak diberikan.</div>";
            }
            ?>
        </div>
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

  <?php include "../include/footer.php"?>
</div>

