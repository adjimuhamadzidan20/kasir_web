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
              <div class="path d-none d-sm-flex align-items-center">
                <div>
                  <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item active">
                      <span><?= $title2; ?></span>
                    </li>
                    <li class="breadcrumb-item">
                      <!-- if breadcrumb is single-->
                      <span><?= $title; ?></span>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col">
              <div class="card mb-4 rounded-0">
                <div class="card-header">
                  Edit Data Kategori
                </div>
                <div class="card-body">
                  <div class="example px-2">
                    <form action="/datakategori/edit/<?= $kategori->id_kategori; ?>" method="post">
                      <div class="mb-3">
                        <label for="kode_kat" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode_kat" name="kode" value="<?= $kategori->kode; ?>" readonly>
                      </div>
                      <div class="mb-4">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="kategori" value="<?= $kategori->kategori; ?>" required>
                      </div>
                      <div class="opsi-footer d-flex justify-content-between">
                        <a class="btn btn-secondary" href="/data_kategori">Kembali<a>
                        <button class="btn btn-primary" type="submit">Edit data</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        
        </div>
      </div>