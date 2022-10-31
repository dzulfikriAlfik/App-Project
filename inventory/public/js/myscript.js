const flashData = $('.flash-data').data('flashdata');
const flashError = $('.flash-error').data('flasherror');
const loginSuccess = $('.login-success').data('flashdata');
const userData = $('.login-success').data('user');
const loginError = $('.login-error').data('flashdata');
const logoutSuccess = $('.logout-success').data('flashdata');
const pesan = $('.flash-data').data('pesan');

if (flashData) {
  Swal.fire({
    title: 'Data ' + pesan,
    text: 'Berhasil ' + flashData,
    type: 'success',
    icon: 'success',
    showConfirmButton: false,
    timer: 2000,
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  });
} else if (flashError) {
  Swal.fire({
    title: 'Data ' + pesan,
    text: flashError,
    type: 'error',
    icon: 'error',
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  });
} else if (loginSuccess) {
  Swal.fire({
    title: loginSuccess,
    text: 'Selamat Datang ' + userData,
    type: 'success',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500,
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  });
} else if (loginError) {
  Swal.fire({
    title: 'Gagal Login',
    text: loginError,
    type: 'error',
    icon: 'error',
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  });
} else if (logoutSuccess) {
  Swal.fire({
    title: logoutSuccess,
    text: 'Terima Kasih sudah berkunjung',
    type: 'success',
    icon: 'success',
    showConfirmButton: false,
    timer: 2000,
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  });
}

// tombol hapus
$('.tombol-hapus').on('click', function (e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah Anda Yakin?',
    text: 'Data ' + pesan + ' akan dihapus!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data',
    footer: '<b>Aplikasi Kasir Penjualan</b>'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });

});
