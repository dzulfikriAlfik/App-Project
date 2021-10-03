<footer class="main-footer">
   <div class="float-right d-none d-sm-inline">
      Sistem Informasi Penduduk
   </div>
   <strong>Copyright &copy; 2021 <a href="https://twitter.com/dzulfikri_alfik">Dzulfikri Alkautsari</a>.</strong>
</footer>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= baseUrl('assets/bootstrap/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= baseUrl('assets/bootstrap/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= baseUrl('assets/bootstrap/dist/js/adminlte.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?= baseUrl('assets/bootstrap/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= baseUrl('assets/bootstrap/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= baseUrl('assets/bootstrap/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= baseUrl('assets/bootstrap/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= baseUrl('assets/bootstrap/dist/js/demo.js'); ?>"></script>
<!-- jquery-validation -->
<script src="<?= baseUrl('assets/bootstrap/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?= baseUrl('assets/bootstrap/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= baseUrl('assets/bootstrap/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<!-- page script -->
<script>
$(function() {
   bsCustomFileInput.init();
});
</script>
<script>
$(function() {
   $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
   });
   $('#example2').DataTable({
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
<script>
$(function() {
   // $.validator.setDefaults({
   //    submitHandler: function() {
   //       window.location.href('penduduk_save.php');
   //    }
   // });
   $('#quickForm').validate({
      rules: {
         nik: {
            required: true,
            minlength: 16,
            maxlength: 16,
            digits: true,
         },
         nama: {
            required: true,
         },
         no_kk: {
            required: true,
            minlength: 16,
            maxlength: 16,
            digits: true,
         },
         tempat_lahir: {
            required: true,
         },
         pekerjaan: {
            required: true,
         },
         alamat: {
            required: true,
         },
         kewarganegaraan: {
            required: true,
         },
         id_agama: {
            required: true,
         },
         id_status: {
            required: true,
         },
         id_mutasi: {
            required: true,
         },
      },
      messages: {
         nik: {
            required: "NIK tidak boleh kosong!",
            minlength: "NIK harus berjumlah 16 angka",
            maxlength: "NIK harus berjumlah 16 angka",
            digits: "NIK hanya boleh diisi dengan angka"
         },
         nama: {
            required: "Nama tidak boleh kosong!"
         },
         no_kk: {
            required: "No. Kartu Keluarga tidak boleh kosong!",
            minlength: "No. Kartu Keluarga harus berjumlah 16 angka",
            maxlength: "No. Kartu Keluarga harus berjumlah 16 angka",
            digits: "No. Kartu Keluarga hanya boleh diisi dengan angka"
         },
         tempat_lahir: {
            required: "Tempat lahir tidak boleh kosong!"
         },
         pekerjaan: {
            required: "Pekerjaan tidak boleh kosong!"
         },
         alamat: {
            required: "Alamat tidak boleh kosong!"
         },
         kewarganegaraan: {
            required: "Kewarganegaraan tidak boleh kosong!"
         },
         id_agama: {
            required: "Agama tidak boleh kosong!"
         },
         id_status: {
            required: "Status tidak boleh kosong!"
         },
         id_mutasi: {
            required: "Mutasi tidak boleh kosong!"
         },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
      }
   });
});
</script>
</body>

</html>