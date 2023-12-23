  <body>
    <!-- container nav -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <!-- header-nav -->
      <?= $this->include('section/navbar') ?>

      <div class="body flex-grow-1 px-3">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col">
              <h3>Profile Akun</h3>
            </div>
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col">

              <!-- pesan / alert popup -->
              <?php if (session()->getFlashData('info')) : ?>
                <div class="alert alert-success small" role="alert" id="pesan">
                  <?= session()->getFlashData('info'); ?>
                </div>
              <?php endif; ?>

              <!-- Profile Image -->
              <div class="card card-primary card-outline rounded-0 py-4 px-5">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="text-center mb-3">
                        <img class="profile-user-img img-fluid img-circle"
                            src="assets/img/avatars/admin_user.png"
                            alt="admin_user" width="180" height="180">
                      </div>

                      <h4 class="profile-username text-center"><?= session()->get('admin'); ?></h4>
                      <p class="text-center">Administrator</p>
                    </div>
                    <div class="col-lg-9">
                      <strong><i class="fas fa-book mr-1"></i> Nama Admin</strong>
                      <p><?= session()->get('admin'); ?></p>

                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Username</strong>
                      <p><?= session()->get('user'); ?></p>

                      <strong><i class="fas fa-pencil-alt mr-1"></i> Password</strong>
                      <p class="mt-2">
                        <a href="/profile/ganti_password" class="btn btn-primary">Ganti Password</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
            
          </div>
          <!-- /.col -->
        </div>
      </div>