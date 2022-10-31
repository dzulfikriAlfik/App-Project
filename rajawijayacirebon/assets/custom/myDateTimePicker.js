$(function() {
   //Initialize Select2 Elements
   $('.select2').select2()

   //Initialize Select2 Elements
   $('.select2bs4').select2({
      theme: 'bootstrap4'
   })

   //Datemask dd/mm/yyyy
   $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
   })
   //Datemask2 mm/dd/yyyy
   $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
   })
   //Money Euro
   $('[data-mask]').inputmask()

   //Date range picker
   $('#reservationdate').datetimepicker({
      format: 'YYYY-MM-DD',
      // locale: 'id'
   });
   //Date range picker
   $('#reservation').daterangepicker()
   //Date range picker with time picker
   $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
         format: 'MM/DD/YYYY hh:mm A'
      }
   })

   //Timepicker
   $('#timepicker').datetimepicker({
      format: 'LT'
   })

   //Bootstrap Duallistbox
   $('.duallistbox').bootstrapDualListbox()

})