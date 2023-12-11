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
                    <form action="/dataproduk/edit/<?= $produk->id_produk; ?>" method="post">
                      <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $produk->kode; ?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="namaproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?= $produk->nama_produk; ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" id="kategori" name="kategori" required>
                          <option value="<?= $produk->id_kategori; ?>" selected><?= $produk->kategori; ?></option>
                          <?php foreach ($kategori as $data) : ?>
                            <option value="<?= $data['id_kategori']; ?>"><?= $data['kategori']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="hargasatuan" class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" id="hargasatuan" name="hargasatuan" value="<?= $produk->harga_satuan; ?>" required>
                      </div>
                      <div class="mb-4">
                        <label for="jumlahstok" class="form-label">Jumlah Stok</label>
                        <input type="text" class="form-control" id="jumlahstok" name="jumlahstok" value="<?= $produk->jumlah_stok; ?>" required>
                      </div>
                      <div class="opsi-footer d-flex justify-content-between">
                        <a class="btn btn-secondary" href="/data_produk">Kembali<a>
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