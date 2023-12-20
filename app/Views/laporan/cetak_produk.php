<?php  
  setlocale(LC_ALL, 'id-ID', 'id_ID');
  $tgl1 = strftime("%A, %d %B %Y | %T");
  $tgl2 = strftime("%d %B %Y");
?>

<body>
  <div style="width: 80%; margin: auto;">
    <div class="card-header mt-2" style="border-bottom: 2px solid black; padding-bottom: 5px;">
      <h1>E - Kasir</h1>    
    </div>
    <div class="card-body">
      <h5 class="mb-2 mt-2">Laporan Data Produk</h5>
      <p class="mb-2"><?= $tgl1; ?></p>  
      <table class="table" width="100%" cellpadding="5">
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
              <td><?= 'Rp '. number_format($data['harga_satuan']); ?></td>
              <td><?= $data['jumlah_stok']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer" style="text-align: right; margin-top:40px; background-color: white;">
      <p>Kota Bekasi, <?= $tgl2; ?></p>
      <p style="margin-right: 65px;">Admin</p>
      <br><br>
      <p style="margin-right: 27px;">..................................</p>
    </div>
  </div>
</body>

<script type="text/javascript">
  window.print();
</script>