<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>E-Learning | Pertakina LSM</title>
  <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon" />
  <link rel="shortcut icon" href="assets/images/fav.jpg" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.carousel.min.css" />
  <link rel="shortcut icon" href="https://pertakina.org/wp-content/uploads/2020/06/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/plugins/testimonial/css/owl.theme.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
  <header class="shadow-md">
    <div class="hed-top text-white bg-primary d-sm-block border-bottom">
      <div class="container-xl">
        <div class="row p-1">
          <div class="col-lg-8 d-none d-lg-block">
            <ul class="text-white leftlist ld fs-8">
              <li class="float-start p-2 px-3">
                <a href="mailto://lms@pertakina.org/" class="text-white">
                  <i class="bi fs-10 bi-envelope"> info@lms.pertakina.org</i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 px-5">
            <ul class="text-white float-end">
              <li class="float-start fs-8 p-3 py-2">
                <a href="https://www.facebook.com/pertakinaindonesia" class="text-white">
                  <i class="bi bi-facebook"></i>
                </a>
              </li>
              <li class="float-start fs-8 p-3 py-2">
                <a href="https://twitter.com/pertakina" class="text-white">
                  <i class="bi bi-twitter"></i>
                </a>
              </li>
              <li class="float-start fs-8 p-3 py-2">
                <a href="https://www.instagram.com/pertakinaindonesia/" class="text-white">
                  <i class="bi bi-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="menu-jk" class="nav-part bg-white">
      <div class="container-xl">
        <div class="row">
          <div class="col-lg-3">
            <img class="py-3" src="assets/images/Pertakina-footer.png" alt="" />
            <a data-bs-toggle="collapse" data-bs-target="#menu" class="float-end d-lg-none pt-3 ps-3"><i class="bi fs-1 cp bi-list"></i>
            </a>
          </div>
          <?php
          // Mengambil nama file dari URL saat ini
          $current_page = basename($_SERVER['PHP_SELF']);

          // Membuat array yang berisi setiap tautan dan nama file yang terkait
          $links = array(
            'index.php' => 'BERANDA',
            'course.php' => 'LEARNING COURSE',
            'https://pertakina.org/keanggotaan-dan-pengurus/' => 'TENTANG KAMI'
          );
          ?>

          <div id="menu" class="col-lg-9 d-none d-lg-block">
            <ul class="fw-bold float-end nacul fs-7">
              <?php foreach ($links as $link => $label) : ?>
                <li class="float-start <?php echo ($link == $current_page) ? 'active' : ''; ?> p-1 px-5">
                  <a href="<?php echo $link; ?>"><?php echo $label; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php include "../config/database/database.php"; ?>

