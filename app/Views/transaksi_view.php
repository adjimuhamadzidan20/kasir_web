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
            <div class="col-12 col-lg-8">
              <div class="card mb-3 rounded-0">
                <div class="card-body">

                  <!-- pesan / alert popup -->
                  <div id="msg"></div>

                  <form method="post" id="formList">
                    <div class="row">
                      <div class="col-12 col-lg">
                        <div class="mb-3">
                          <label for="produk" class="form-label">Pilih Produk</label>
                          <select class="form-select" aria-label="Default select example" name="produk" id="produk" required>
                            <option selected>-- Pilih Produk --</option>
                            <?php foreach ($produk as $data) : ?>
                              <option value="<?= $data['id_produk']; ?>"><?= $data['nama_produk']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-lg">
                        <div class="mb-3">
                          <label for="harga" class="form-label">Harga Satuan</label>
                          <input type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                      </div>
                      <div class="col-12 col-lg">
                        <div class="mb-3">
                          <label for="qty" class="form-label">Qty</label>
                          <input type="text" class="form-control" placeholder="Qty" id="qty" name="qty" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="modal-footer mb-4 d-flex justify-content-start">
                          <button class="btn btn-primary px-3" type="button" id="submit_list">Tambah<i class="cil-plus icon ms-1"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>

                  <div class="row mb-3">
                    <div class="col">
                      <div class="example">
                        <div class="rounded-bottom">
                          <div class="label mb-2">
                            List Item Produk
                          </div>
                          <div class="tab-pane active preview table-responsive" role="tabpanel" id="preview-557">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col" nowrap="nowrap">Nama Produk</th>
                                  <th scope="col" nowrap="nowrap">Harga Satuan</th>
                                  <th scope="col" nowrap="nowrap">Qty</th>
                                  <th scope="col" nowrap="nowrap">Total</th>
                                  <th scope="col" nowrap="nowrap" class="text-center">Opsi</th>
                                </tr>
                              </thead>

                              <tbody id="datatransaksi"> 
                              
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="modal-footer mb-3 d-flex justify-content-start">
                        <button class="btn btn-primary px-3" type="button" id="jumlah_total">Hitung Total</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="col-12 col-lg">
              <div class="card mb-3 rounded-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="mb-4">
                        <label class="form-label">Jumlah Total</label>
                        <h2>Rp. <span id="jumlah"></span></h2>
                      </div>
                      <form method="post" id="pembayaran">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Tunai yang diterima</label>
                          <input type="text" class="form-control" id="tunai" placeholder="Tunai pembayaran" name="tunai" required>
                        </div>
                        <div class="modal-footer d-flex justify-content-start">
                          <button class="btn btn-primary px-3" type="button" id="cek_bayar">Cek pembayaran</button>
                        </div>
                      </form>
                      <div class="mt-4">
                        <label class="form-label">Kembalian</label>
                        <h2>Rp. <span id="kembalian"></span></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="popup_bayar" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Info Transaksi</h5>
              <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-5">
                  <p>Jumlah Total Belanja</p>
                </div>
                <div class="col">
                  <p>:  Rp. <span id="total_jumlah"></span></p>
                </div>
              </div>
              <div class="row">
                <div class="col-5">
                  <p>Nominal Pembayaran</p>
                </div>
                <div class="col">
                  <p>:  Rp. <span id="tunai_pembayaran"></span></p>
                </div>
              </div>
              <div class="row">
                <div class="col-5">
                 <p>Tunai Kembali</p>
                </div>
                <div class="col">
                  <p>:  Rp. <span id="tunai_kembali"></span></p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button> -->
              <form action="/transaksi/resetList">
                <button type="submit" class="btn btn-primary" id="transaksi_done">Proses transaksi selesai</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      