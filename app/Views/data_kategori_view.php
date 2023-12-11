  <body>
    <!-- container nav -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <!-- header-nav -->
      <?= $this->include('section/navbar') ?>

      <div class="body flex-grow-1 px-2">
        <div class="container-fluid"> 
          <div class="row mb-2">
            <div class="col d-flex justify-content-between">
              <h3>Data <?= $title; ?></h3>
              <div class="path d-none d-sm-flex align-items-center">
                <div>
                  <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item active">
                      <span>Dashboard</span>
                    </li>
                    <li class="breadcrumb-item">
                      <!-- if breadcrumb is single-->
                      <span>Data <?= $title; ?></span>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card mb-4 rounded-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-primary btn-sm px-3" data-coreui-toggle="modal" data-coreui-target="#tambahKategori">Tambah<i class="cil-plus icon ms-1"></i></button>
                  <span class="d-none d-sm-flex">Tabel Data Kategori</span>
                </div>
                <div class="card-body">                  
                  <div class="example">

                    <!-- pesan / alert popup -->
                    <?php if (session()->getFlashData('sukses')) : ?>
                      <div class="alert alert-success small" role="alert" id="pesan">
                        <?= session()->getFlashData('sukses'); ?>
                      </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashData('gagal')) : ?>
                      <div class="alert alert-danger small" role="alert" id="pesan">
                        <?= session()->getFlashData('gagal'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <div class="rounded-bottom">
                      <div class="tab-pane active preview table-responsive" role="tabpanel" id="preview-557">
                        <table class="table table-bordered" id="example">
                          <thead>
                            <tr>
                              <th scope="col" nowrap="nowrap">No</th>
                              <th scope="col" nowrap="nowrap">Kode</th>
                              <th scope="col" nowrap="nowrap">Kategori Produk</th>
                              <th scope="col" nowrap="nowrap" class="text-center">Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $no = 0;
                              foreach ($kategori as $data) :
                              $no++;
                            ?>
                              <tr>
                                <td nowrap="nowrap"><?= $no; ?></td>
                                <td nowrap="nowrap"><?= $data['kode']; ?></td>
                                <td nowrap="nowrap"><?= $data['kategori']; ?></td>
                                <td nowrap="nowrap" class="text-center">
                                  <a href="/edit_kategori/<?= $data['id_kategori']; ?>" class="btn btn-primary btn-sm"><i class="cil-color-border icon me-1"></i>Edit</a>
                                  <a href="/hapus_kategori/<?= $data['id_kategori']; ?>" class="btn btn-primary btn-sm"><i class="cil-trash icon me-1"></i>Hapus</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
          
          <!-- modal tambah -->
          <div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLiveLabel">Tambah data kategori</h5>
                  <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/datakategori/tambah" method="post">
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kategori Barang" name="kategori" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Kembali</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    