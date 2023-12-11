<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>E - Kasir | <?= $title; ?></title>

    <base href="<?= base_url('assets'); ?>/">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center px-4 px-sm-0">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card-group d-block d-md-flex row">
              <div class="card px-3 py-2 mb-0">
                <div class="card-body">
                  <div class="profil-admin d-flex mb-2 align-items-center">
                    <div class="avatar avatar-md me-3">
                      <img class="avatar-img" src="assets/img/avatars/admin_user.png" alt="admin_user">
                    </div>
                    <strong><?= session()->get('admin'); ?></strong>
                  </div>
                  
                  <label class="text-medium-emphasis mb-2">Lock Screen</label>

                  <!-- pesan / alert popup -->
                  <?php if (session()->getFlashData('pesan')) : ?>
                    <div class="alert alert-danger small" role="alert" id="pesan">
                      <?= session()->getFlashData('pesan'); ?>
                    </div>
                  <?php endif; ?>
        
                  <form action="/lockscreen/masuk" method="post">

                    <!-- password -->
                    <div class="input-group mb-1"><span class="input-group-text">
                        <svg class="icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                        </svg></span>
                      <input class="form-control" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="mb-3 text-medium-emphasis">
                      Enter your password to retrieve your session
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit">Masuk</button>
                      </div>
                      <!-- <div class="col-6 text-end">
                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                      </div> -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets'); ?>/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendors/simplebar/js/simplebar.min.js"></script>

    <!-- settingan alert -->
    <script type="text/javascript">
      let popup = document.getElementById('pesan');
      if (popup.style.display = 'block') {
        setTimeout(function() {
          popup.style.opacity = '0'
          popup.style.transition = 'opacity 1s ease-in-out';
          setTimeout(function() {
              popup.style.display = 'none';
          }, 1000)
        }, 1000);
      }
    </script>

  </body>
</html>