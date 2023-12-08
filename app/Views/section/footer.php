    <footer class="footer">
      <div>E-Kasir © 2023</div>
      <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
    </footer>
  </div>

  <!-- CoreUI and necessary plugins-->
  <script src="<?= base_url('assets'); ?>/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
  <script src="<?= base_url('assets'); ?>/vendors/simplebar/js/simplebar.min.js"></script>
  <!-- Plugins and scripts required by this view-->
  <!-- <script src="vendors/chart.js/js/chart.min.js"></script>
  <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
  <script src="vendors/@coreui/utils/js/coreui-utils.js"></script> -->
  <script src="<?= base_url('assets'); ?>/js/main.js"></script>

  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
  <script type="text/javascript" src="<?= base_url('assets'); ?>/js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="<?= base_url('assets'); ?>/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= base_url('assets'); ?>/js/dataTables.bootstrap5.min.js"></script>

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
      let qty = $('#qty').val();

      if (qty == "") {
        let pesan = 'Masukan jumlah Qty!';
        let popup = '<div class="alert alert-info small" role="alert" id="pesan">'+ pesan +'</div>';
        $('#msg').html(popup);

        function qtyAlert() {
          $('#msg').fadeOut(1000);
        }
        setTimeout(function() {
          qtyAlert();
        }, 1500);
      } 
      else {
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
      }
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
      let totalInt = parseInt(total);
      let tunaiInt = parseInt(tunai);

      if (tunai == "") {
        let pesan = 'Masukan nominal tunai!';
        let popup = '<div class="alert alert-info small" role="alert" id="pesan">'+ pesan +'</div>';
        $('#msg').html(popup);

        function nominalAlert() {
          $('#msg').fadeOut(1000);
        }
        setTimeout(function() {
          nominalAlert();
        }, 1500);
      } 
      else if (tunaiInt < totalInt) {
        let pesan = 'Tunai pembayaran kurang dari jumlah total!';
        let popup = '<div class="alert alert-info small" role="alert" id="pesan">'+ pesan +'</div>';
        $('#msg').html(popup);

        function tunaiAlert() {
          $('#msg').fadeOut(1000);
        }
        setTimeout(function() {
          tunaiAlert();
        }, 1500);
      } 
      else if (tunaiInt > totalInt || tunaiInt == totalInt) {
        $('#kembalian').text(jumlah);
        $('#total_jumlah').text(total);
        $('#tunai_pembayaran').text(tunai);
        $('#tunai_kembali').text(jumlah);

        $('#popup_bayar').modal('show');

      }
    });

    $('#transaksi_done').on('click', function() {
      let formTunai = $('#pembayaran').serialize();

      $.ajax({
        url: '<?= base_url('laporanpemasukan/tambahPemasukan'); ?>',
        type: 'POST',
        dataType: 'json',
        data: formTunai,
        success: function() {
          console.log('pemasukan masuk')
        },
        error: function() {
          console.log('pemasukan gagal')
        }
      })
    });
    
  </script>

  <!-- settingan alert -->
  <script type="text/javascript">
    let notif = document.getElementById('pesan');
    if (notif.style.display = 'block') {
      setTimeout(function() {
        notif.style.opacity = '0'
        notif.style.transition = 'opacity 1s ease-in-out';
        setTimeout(function() {
            notif.style.display = 'none';
        }, 1000)
      }, 1000);
    }
  </script>

  <script type="text/javascript">
    $(function () {
      $('#exampleLaporan').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

  </script>

</body>
</html>