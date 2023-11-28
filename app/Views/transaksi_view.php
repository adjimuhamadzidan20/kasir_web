  <body>
    <!-- container nav -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-3">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg></a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                </svg></a></li>
          </ul>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Account</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                  </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                  </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-task"></use>
                  </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                  </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg> Profile</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                  </svg> Settings</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                  </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                  </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                  </svg> Lock Account</a><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid d-flex justify-content-between align-items-center py-2">
          <div class="halaman">
            Transaksi
          </div>
          <div class="link-halaman">
            <ol class="breadcrumb my-0">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single-->
                <span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </div>
        </div>
      </header>
      
      <div class="body flex-grow-1">
        <div class="container-fluid">
          <div class="row">
            <div class="col-8">
              <div class="card mb-3 rounded-0">
                <div class="card-body">
                  <form method="post" id="formList">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3">
                          <label for="produk" class="form-label">Pilih Produk</label>
                          <select class="form-select" aria-label="Default select example" name="produk" id="produk" required>
                            <option value="" selected>-- Pilih Produk --</option>
                            <?php foreach ($produk as $data) : ?>
                              <option value="<?= $data['id_produk']; ?>"><?= $data['nama_produk']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <label for="harga" class="form-label">Harga Satuan</label>
                          <input type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                      </div>
                      <div class="col">
                        <div class="mb-3">
                          <label for="qty" class="form-label">Qty</label>
                          <input type="text" class="form-control" placeholder="Qty" id="qty" name="qty" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="modal-footer mb-4 d-flex justify-content-start">
                          <button class="btn btn-primary btn-sm" type="button" id="submit_list">Tambah</button>
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
                          <div class="tab-pane active preview" role="tabpanel" id="preview-557">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">Nama Produk</th>
                                  <th scope="col">Harga Satuan</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Total</th>
                                  <th scope="col" class="text-center">Opsi</th>
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
                        <button class="btn btn-primary btn-sm" type="button" id="jumlah_total">Hitung Total</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="col">
              <div class="card mb-3 rounded-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="mb-4">
                        <label class="form-label">Jumlah Total</label>
                        <h2>Rp. <span id="jumlah"></span></h2>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tunai yang diterima</label>
                        <input type="text" class="form-control" id="tunai" placeholder="Tunai pembayaran" name="tunai" required>
                      </div>
                      <div class="modal-footer d-flex justify-content-start">
                        <button class="btn btn-primary btn-sm" type="button" id="cek_bayar">Cek pembayaran</button>
                      </div>
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
                <button type="submit" class="btn btn-primary">Proses transaksi selesai</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      