  <body>
    <!-- container nav -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <!-- header-nav -->
      <?= $this->include('section/navbar') ?>

      <div class="body flex-grow-1 px-2">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col d-flex justify-content-between">
              <h3><?= $title; ?></h3>
            </div>
          </div> 
          <div class="row">
            <div class="col">
              <div class="card mb-4 rounded-0">
                <div class="card-body">
                  <div class="example px-2">
                    <!-- pesan / alert popup -->
                    <?php if (session()->getFlashData('info')) : ?>
                      <div class="alert alert-danger small" role="alert" id="pesan">
                        <?= session()->getFlashData('info'); ?>
                      </div>
                    <?php endif; ?>

                    <form action="/profil/gantiPass/<?= session()->get('user'); ?>" method="post">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password Lama" name="pass_lama" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password Baru" name="pass_baru" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Konfirm Password Baru</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Konfirm Password Baru" name="konfir_pass_baru" required>
                      </div>
                      <div class="opsi-footer d-flex justify-content-between">
                        <a class="btn btn-secondary" href="/profile">Kembali<a>
                        <button class="btn btn-primary" type="submit">Ganti</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        
        </div>
      </div>