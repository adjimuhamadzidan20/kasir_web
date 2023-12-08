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
              <div class="path d-flex align-items-center">
                <div>
                  <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item active">
                      <span>Dashboard</span>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="nama-page">
                    Laporan Data Produk
                  </div>
                  <div class="opsi">
                    <?php 
                      if (isset($_GET['jenis'])) {
                        $jenis = $_GET['jenis'];
                      } else {
                        $jenis = "";
                      }
                    ?>
                    <a href="/laporan_produk/cetakLapProduk/<?= $jenis; ?>" class="btn btn-primary btn-sm" target="__blank">Print PDF</a>
                    <button type="submit" class="btn btn-primary btn-sm" data-coreui-toggle="modal" data-coreui-target="#exampleModalLive">Print Excel</button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="example">
                    <div class="rounded-bottom">
                      <div class="tab-pane active preview" role="tabpanel" id="preview-557">
                        <form method="get">
                          <div class="opsi d-flex mb-3 justify-content-between">
                            <div class="kolom-filter d-flex col-4">
                              <select class="form-select" aria-label="Default select example" name="jenis" style="margin-right: 10px !important;">
                                <option value="" selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $data) : ?>
                                  <option value="<?= $data['kategori']; ?>"><?= $data['kategori']; ?></option>
                                <?php endforeach; ?>
                              </select>
                              <button type="submit" class="btn btn-primary btn-sm ml-4">Filter</button>
                            </div>
                          </div>
                        </form>
                        <table class="table" id="exampleLaporan">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Kode</th>
                              <th scope="col">Nama Produk</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Harga Satuan</th>
                              <th scope="col">Jumlah Stok</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  
                              $no = 0;
                              foreach ($produk as $data) :
                              $no++;
                            ?>
                              <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['kode']; ?></td>
                                <td><?= $data['nama_produk']; ?></td>
                                <td><?= $data['kategori']; ?></td>
                                <td><?= $data['harga_satuan']; ?></td>
                                <td><?= $data['jumlah_stok']; ?></td>
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
        </div>
      </div>

      