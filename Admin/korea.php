<!--Header -->
<?php include "./include/header.php" ?>
<?php include "./include/pageTitle.php" ?>

<!-- Main Container-->
<div class="container py-5 my-2 mb-5">
  <div class="row">
    <div class="col-lg pb-4">
      <div class="card shadow-md" style="width: 23rem">
        <div class="card-body">
          <img class="icon-search" src="assets/images/pertakina_berdaya.png" alt="" />
          <input class="form-control" type="text" placeholder="Search" aria-label="Search" />
          <h5 class="card-title">Pilihan Bahasa:</h5>
          <div class="mx-3 d-flex gap-2">
            <input type="checkbox" id="englishCheckbox" class="checkbox" />
            <p>Bahasa Inggris</p>
          </div>
          <div class="mx-3 d-flex gap-2">
            <input type="checkbox" id="koreanCheckbox" class="checkbox" checked />
            <p>Bahasa Korea</p>
          </div>
          <div class="mx-3 d-flex gap-2">
            <input type="checkbox" id="japaneseCheckbox" class="checkbox" />
            <p>Bahasa Jepang</p>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Mendapatkan referensi checkbox
      const englishCheckbox = document.getElementById('englishCheckbox');
      const koreanCheckbox = document.getElementById('koreanCheckbox');
      const japaneseCheckbox = document.getElementById('japaneseCheckbox');

      // Menambahkan event listener untuk setiap checkbox
      englishCheckbox.addEventListener('change', function() {
        if (this.checked) {
          window.location.href = 'inggris.php'; // Ganti dengan URL halaman bahasa Inggris
        }
      });

      koreanCheckbox.addEventListener('change', function() {
        if (this.checked) {
          window.location.href = 'korea.php'; // Ganti dengan URL halaman bahasa Korea
        }
      });

      japaneseCheckbox.addEventListener('change', function() {
        if (this.checked) {
          window.location.href = 'jepang.php'; // Ganti dengan URL halaman bahasa Jepang
        }
      });
    </script>


    <div class="col-lg ">
      <?php
      // Lakukan query untuk mengambil video dengan kategori Bahasa Inggris
      $sql_video = "SELECT * FROM vidio WHERE kategori_video = 'Bahasa Korea' LIMIT 5";
      $result_video = $connect->query($sql_video);
      if ($result_video->num_rows > 0) {
        // Looping melalui hasil query video
        while ($row = $result_video->fetch_assoc()) {
          // Ambil data video
          $url_video = $row['url_vidio'];
          $id_vidio = $row['id_vidio'];
          $kategori_video = $row['kategori_video'];
          $judul_video = $row['judul_vidio'];
          $sinopsis_video = $row['sinopsis_vidio'];

          $sql = "SELECT img_thumbnail FROM vidio WHERE id_vidio = '$id_vidio'";

          if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while ($row = $result->fetch_assoc()) {
              $thumbnail_path = "./uploads/" . $row["img_thumbnail"];
            }
          } else {
            echo "Tidak ada gambar yang ditemukan.";
          }
      ?>
          <div class="col-6">
            <div class="card shadow-md">
              <div class="row">
                <div class="col-md-5">
                  <img class="card-img" src="<?php echo  $thumbnail_path; ?>" alt="Card image" />
                </div>
                <div class="col-md-7">
                  <div class="card-body">
                    <p class="category fw-bold fs-6"><?php echo $kategori_video; ?></p>
                    <h4 class="title-category"><?php echo $judul_video; ?></h4>
                    <p class="deskripsi-vidio">
                      <?php echo $sinopsis_video; ?>
                    </p>
                    <button class="px-2 my-3 rounded btn-primary btn-course">
                      <div class="d-flex">
                        <img class="px-2 img-yt" src="assets/images/logo-yt.png" alt="" />
                        <a class="py-2" href="detail.php?id=<?php echo $id_vidio; ?>">Video Pembelajaran</a>
                      </div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php

        }
      } else {
        // Tidak ada data yang ditemukan
      }
      ?>

    </div>
  </div>
</div>
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

</html>