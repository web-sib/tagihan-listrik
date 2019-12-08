<!-- Footer -->
    <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
              </div>
            </div>
    </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

  <script>
  $(".kode").click(function(){
    const value = $(this).data('tarif');
    $(".isi").attr("value",value);
  });

  $(".reload").click(function(){
    $(".isi").attr("value","");
  });

  $(".pelang").click(function(){
    const value = $(this).data("tagihan");
    $(".pel").attr("value",value);
  });

  $(".reload2").click(function(){
    $(".pel").attr("value","");
  });

  $(".tagi").click(function(){
    const value = $(this).data("tagi")
    const nama = $(this).data("nama")
    const alamat = $(this).data("alamat")
    const bulan = $(this).data("bulan")
    const pemakaian = $(this).data("pemakaian")
    const status = $(this).data("status")
    const tanggal = $(this).data("tanggal")
    const jumlah = $(this).data("jumlah")
    const denda = $(this).data("denda")
    const tarif = $(this).data("tarif")


    $(".tag").attr('value',value)
    $(".nama").attr('value',nama)
    $(".alamat").attr('value',alamat)
    $(".bulan").attr('value',bulan)
    $(".pemakaian").attr('value',pemakaian)
    $(".pemakai").attr('value',pemakaian)
    $(".status").attr('value',status)
    $(".tanggal").attr('value',tanggal)
    $(".jumlah").attr('value',jumlah)
    $(".tarif").attr('value',tarif)
    $('#denda').attr('value',denda)
  });

  $(".reload3").click(function(){
    $("denda").attr('value',"")
    $(".tag").attr("value","")
    $(".nama").attr('value',"")
    $(".alamat").attr('value',"")
    $(".bulan").attr('value',"")
    $(".pemakaian").attr('value',"")
    $(".status").attr('value',"")
    $(".tanggal").attr('value',"")
    $(".jumlah").attr('value',"")
  });

  var dengan_rupiah = document.getElementById('admin');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value);
    });

    var rupiah = document.getElementById('denda');
    rupiah.addEventListener('keyup', function(e)
    {
        rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }

    function total(){
      const admin = document.getElementById('admin').value;
      const denda = document.getElementById('denda').value;
      const tarif = document.getElementById('tarif').value;
      const pemakai = document.getElementById('pemakai').value;


      
 		  const ad = parseInt(admin.split('.').join(''));
      const den = parseInt(denda.split('.').join(''));
      const tar = parseInt(tarif.split('.').join(''));
      const pem = parseInt(pemakai.split('.').join(''));

      const jumlah_harga = ad + den + tar + pem;

      var	number_string = jumlah_harga.toString(),
	    sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('jumlah').value = rupiah;


    }

    function tari(){
      const tarif = document.getElementById('tarif').value;

      const tar = parseInt(tarif.split('.').join(''));

      var	number_string = tar.toString(),
	    sisa 	= number_string.length % 3,
      rupiah 	= number_string.substr(0, sisa),
      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('tarif').value = rupiah;      
    }

  </script>

</body>

</html>
