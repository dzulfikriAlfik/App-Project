$(function() {
   // $.validator.setDefaults({
   //    submitHandler: function() {
   //       window.location.href('penduduk_save.php');
   //    }
   // });
   // pendudukValidator
   $('#pendudukValidator').validate({
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
         tanggal_lahir: {
            required: true,
         },
         id_pekerjaan: {
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
         tanggal_lahir: {
            required: "Tanggal lahir tidak boleh kosong!"
         },
         id_pekerjaan: {
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

   // pekerjaanValidator
   $('#pekerjaanValidator').validate({
      rules: {
         pekerjaan: {
            required: true
         }
      },
      messages: {
         nik: {
            required: "Field jenis pekerjaan tidak boleh kosong!"
         }
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