    <footer class="footer">
      <div>E - Kasir © 2023 creativeLabs.</div>
      <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
    </footer>
  </div>

  <!-- CoreUI and necessary plugins-->
  <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="vendors/simplebar/js/simplebar.min.js"></script>
  <!-- Plugins and scripts required by this view-->
  <!-- <script src="vendors/chart.js/js/chart.min.js"></script>
  <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
  <script src="vendors/@coreui/utils/js/coreui-utils.js"></script> -->
  <script src="js/main.js"></script>

  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
  <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

  <script>
    new DataTable('#example');

    // fungsi memunculkan harga
    $(document).ready(function () {
      $('#harga').val(0);
      $('#jumlah').text(0);
      $('#kembalian').text(0);

      $('#produk').change(function () {
        let namaproduk = $("#produk option:selected").val();
        
        if (namaproduk === '') {
          $("#harga").val(0);
        } else {
          // Kirim permintaan AJAX untuk mendapatkan harga produk
          $.ajax({
            type: 'GET',
            url: '<?= base_url('transaksi/listHarga/'); ?>' + namaproduk,
            success: function (response) {
              // Update nilai input harga
              $("#harga").val(response.harga_satuan);
            }
          });
        }
      });
    });

    // menampilkan isi data
    $(document).ready(function () {
      listTransaksi();
    });

    // menangkap seluruh data transaksi
    function listTransaksi() {
      $.ajax({
          type: 'GET',
          url: '<?= base_url('transaksi/getTransaksi'); ?>',
          async: false,
          dataType: 'json',
          success: function (data) {
            let html = '';
            for (let i = 0; i < data.length; i++) {
              html += '<tr>' +
                '<td>' + data[i].nama_produk + '</td>' +
                '<td>' + data[i].harga + '</td>' +
                '<td>' + data[i].qty + '</td>' +
                '<td>' + data[i].total + '</td>' +
                '<td style="text-align: center;">' +
                  '<button type="button" id="hapus" class="btn btn-primary btn-sm" data-id="' + data[i].id_transaksi + '">Hapus</button>' +
                '</td>' +
              '</tr>';
            }
            $('#datatransaksi').html(html);
          },
          error: function () {
            console.log('Gagal memuat data.');
          }
      });
    }

    // menambahkan data baru
    $('#submit_list').click(function() {
      let formdata = $('#formList').serialize();

      $.ajax({
        type: "POST",
        url: "<?= base_url('transaksi/simpanList'); ?>",
        dataType: "json",
        data: formdata,
        success: function (response) {                      
          $('#produk').val('');
          $('#harga').val(0);
          $('#qty').val('');

          updateTabel(response);
          listTransaksi();
        },
        error: function () {
          console.log('Gagal submit data.');
        }
      });
    });

    // menghapus data
    $('#datatransaksi').on('click', '#hapus', function() {
      let opsi = $(this);
      let idtransaksi = opsi.data('id');

      $.ajax({
        type: "POST",
        dataType: 'json',
        url: '<?= base_url('transaksi/hapusList/'); ?>' + idtransaksi,
        success: function(response) {
          updateTabel(response);
          listTransaksi();
        },
        error: function() {
          console.log('Gagal hapus data.');
        }
      })
    });

    // memperbaharui tabel
    function updateTabel(data) {
      let tabelUpdate = '';
      tabelUpdate += '<tr>' +
                  '<td>' + data.nama_produk + '</td>' +
                  '<td>' + data.harga + '</td>' +
                  '<td>' + data.qty + '</td>' +
                  '<td>' + data.total + '</td>' +
                  '<td style="text-align: center;">' +
                    '<button type="submit" id="hapus" class="btn btn-primary btn-sm" data-id="' + data.id_transaksi + '">Hapus</button>' +
                  '</td>' +
                '</tr>';
      
      $('#datatransaksi').html(tabelUpdate);
    }

    // menghitung jumlah total harga seluruh item
    $('#jumlah_total').click(function() {
      $.ajax({
        type: 'GET',
        url: '<?= base_url('transaksi/jumlahTotal'); ?>',
        dataType: 'json',
        success: function(data) { 
          let hasil = data.jumlah;
          // console.log(hasil)
          $('#jumlah').text(hasil);
        },
        error: function() {
          console.log('Gagal hitung jumlah.');
        }
      })      
    });

    // mengecek pembayaran
    $('#cek_bayar').on('click', function() {
      let total = $('#jumlah').text();
      let tunai = $('#tunai').val();
      let jumlah = tunai - total;

      // console.log(parseInt(total))
      // console.log(parseInt(tunai))
      // console.log(jumlah)

      let totalInt = parseInt(total);
      let tunaiInt = parseInt(tunai);

      if (tunai == "") {
        alert('Masukan nominal tunai!');
      } 
      else if (tunaiInt < totalInt) {
        alert('Tunai pembayaran kurang dari jumlah total!');
      } 
      else if (tunaiInt > totalInt || tunaiInt == totalInt) {
        $('#kembalian').text(jumlah);
        $('#total_jumlah').text(total);
        $('#tunai_pembayaran').text(tunai);
        $('#tunai_kembali').text(jumlah);

        $('#popup_bayar').modal('show');
      }
    });
    
  </script>

</body>
</html>