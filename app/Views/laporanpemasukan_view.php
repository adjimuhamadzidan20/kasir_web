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
                    Laporan Data Pemasukan
                  </div>
                  <div class="opsi">
                    <?php 
                      if (isset($_GET['bulan']) OR isset($_GET['tahun'])) {
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                      } else {
                        $bulan = "";
                        $tahun = "";
                      }
                    ?>
                    <a href="/laporan_pemasukan/cetakLapPemasukan/<?= $bulan; ?>/<?= $tahun; ?>" class="btn btn-primary btn-sm" target="__blank">Print PDF</a>
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
                              <select class="form-select" aria-label="Default select example" name="bulan" style="margin-right: 10px !important;">
                                <option value="" selected>-- Pilih Bulan --</option>
                                <option value="Jan">Januari</option>
                                <option value="Feb">Februari</option>
                                <option value="Mar">Maret</option>
                                <option value="Apr">April</option>
                                <option value="May">Mei</option>
                                <option value="Jun">Juni</option>
                                <option value="Jul">Juli</option>
                                <option value="Agu">Agustus</option>
                                <option value="Sep">September</option>
                                <option value="Oct">Oktober</option>
                                <option value="Nov">November</option>
                                <option value="Dec">Desember</option>
                              </select>
                              <select class="form-select" aria-label="Default select example" name="tahun" style="margin-right: 10px !important;">
                                <option value="" selected>-- Pilih Tahun --</option>
                                <?php 
                                  $tahun = 2018;
                                  while ($tahun <= 2030) :
                                ?>
                                  <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php  
                                  $tahun++;
                                  endwhile;
                                ?>
                              </select>
                              <button type="submit" class="btn btn-primary btn-sm ml-4">Filter</button>
                            </div>
                            <div class="kolom-jumlah d-flex align-items-center">
                              <label for="exampleFormControlInput1" style="margin-right: 8px !important;">Total</label>
                              <input type="text" class="form-control" id="total" placeholder="Jumlah Total" value="<?= $total; ?>" readonly>
                            </div>
                          </div>
                        </form>
                        <table class="table" id="exampleLaporan">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Tanggal Pemasukan</th>
                              <th scope="col">Bulan Pemasukan</th>
                              <th scope="col">Jumlah Nominal</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  
                              $no = 0;
                              foreach ($pemasukan as $data) :
                              $no++;
                            ?>
                              <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['tanggal_pemasukan']; ?></td>
                                <td><?= $data['bulan_pemasukan']; ?></td>
                                <td><?= $data['jumlah_nominal']; ?></td>
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

      