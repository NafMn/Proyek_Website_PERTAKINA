<?php require "../include/head.php"; ?>
<?php require "../include/nav.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      Dashboard Learning Manajement System
    </h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Jumlah Vidio
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                // Hitung jumlah vidio
                $sql_count = "SELECT COUNT(*) AS total_vidio FROM vidio";
                $result_count = $connect->query($sql_count);
                $row_count = $result_count->fetch_assoc();
                echo $row_count['total_vidio'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-video fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Kategori Bahasa
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $sql_count = "SELECT 
                        COUNT(*) AS total_kategori,
                        kategori_video
                    FROM 
                        vidio
                    WHERE 
                        kategori_video IN ('bahasa inggris', 'bahasa jepang', 'bahasa korea')
                    GROUP BY 
                        kategori_video;";
                $result_count = $connect->query($sql_count);

                $total_kategori = 0;

                while ($row_count = $result_count->fetch_assoc()) {
                  $total_kategori += $row_count['total_kategori'];
                }

                echo $total_kategori;
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-language fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-flex justify-content-between">
        <h6 class="font-weight-bold text-danger align-self-center py-2">
          Data Pembelajaran Bahasa
        </h6>
        <a href="create.php" class="btn btn-danger py-2 px-3 my-2 text-white align-self-center">
          <i class="fas fa-folder-plus"></i>
          Tambah Vidio
        </a>
      </div>
    </div>
    <?php
    $value_per_page = 0;
    ?>
    <div class="card-body">
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="dataTable_length">
                <label>Show
                  <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="10" <?php echo ($value_per_page == 10) ? 'selected' : ''; ?>>10</option>
                    <option value="25" <?php echo ($value_per_page == 25) ? 'selected' : ''; ?>>25</option>
                    <option value="50" <?php echo ($value_per_page == 50) ? 'selected' : ''; ?>>50</option>
                    <option value="100" <?php echo ($value_per_page == 100) ? 'selected' : ''; ?>>100</option>
                  </select>
                  entries
                </label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div id="dataTable_filter" class="dataTables_filter">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Course..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-danger" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%">
                <thead>
                  <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 15px" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                      No
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 61px" aria-label="Position: activate to sort column ascending">
                      URL Vidio
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 49px" aria-label="Office: activate to sort column ascending">
                      Judul Vidio
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 31px" aria-label="Age: activate to sort column ascending">
                      Kategori Vidio
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 31px" aria-label="Age: activate to sort column ascending">
                      Durasi
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 150px" aria-label="Start date: activate to sort column ascending">
                      Sinopsis
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 300px" aria-label="Salary: activate to sort column ascending">
                      Deskripsi Vidio
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 40px" aria-label="Salary: activate to sort column ascending">
                      Action
                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">ID</th>
                    <th rowspan="1" colspan="1">URL Vidio</th>
                    <th rowspan="1" colspan="1">Judul Vidio</th>
                    <th rowspan="1" colspan="1">Kategori Vidio</th>
                    <th rowspan="1" colspan="1">Durasi</th>
                    <th rowspan="1" colspan="1">Sinopsis</th>
                    <th rowspan="1" colspan="1">Deskripsi</th>
                    <th rowspan="1" colspan="1">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  // Query untuk mengambil data dari database
                  $sql = "SELECT * FROM vidio ORDER BY id_vidio DESC";
                  $result = $connect->query($sql);
                  // Periksa apakah ada hasil yang ditemukan
                  $number = 1;
                  if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $number . "</td>";
                      echo "<td>" . $row['url_vidio'] . "</td>";
                      echo "<td>" . $row['judul_vidio'] . "</td>";
                      echo "<td>" . $row['kategori_video'] . "</td>";
                      echo "<td>" . $row['durasi_vidio'] . "</td>";
                      echo "<td>" . $row['sinopsis_vidio'] . "</td>";
                      echo "<td>" . $row['deskripsi_vidio'] . "</td>";
                      echo "<td>
                                <div class='d-flex'>
                                    <a href='show.php?id=" . $row['id_vidio'] . "' class='btn btn-primary btn-circle'>
                                        <i class='far fa-eye'></i>
                                    </a>
                                    <a href='edit.php?id=" . $row['id_vidio'] . "' class='btn btn-warning btn-circle mx-2'>
                                        <i class='far fa-edit'></i>
                                    </a>
                                    <a href='delete.php?id=" . $row['id_vidio'] . "' class='btn btn-danger btn-circle' onclick='return konfirmasiHapus();'>
                                        <i class='fas fa-trash'></i>
                                    </a>
                                </div>    
                            </td>";
                      echo "</tr>";
                      $number++;
                    }
                  } else {
                    echo "<tr><td colspan='8'>Tidak ada data yang tersedia</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <script>
            function konfirmasiHapus() {
              var konfirmasi = confirm("Apakah Anda yakin ingin menghapus?");

              if (konfirmasi) {
                alert("Data telah dihapus!");
                return true;
              } else {
                alert("Penghapusan dibatalkan.");
                return false;
                window.history.back();
              }
            }
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include "../include/footer.php"; ?>
<!-- Footer -->