// const form = document.getElementById('form');
// const btn = document.getElementById('mybtn');
// const btndone = document.getElementById('mybtndone');
// btn.addEventListener('click', () => {
//    form.toggleAttribute('disabled');
//    if (btn.innerHTML == 'Edit' && btn.classList.contains('btn-warning')) {
//       btn.innerHTML = 'Done';
//       btn.classList.remove('btn-warning');
//       btn.classList.add('btn-success');
//    } else if (btn.innerHTML == 'Done' && btn.classList.contains('btn-success')) {
//       btn.innerHTML = 'Edit';
//       btn.classList.remove('btn-success')
//       btn.classList.add('btn-warning')
//       window.location = 'proses.php';
//    }
// });

'use strict';

const btnCompany = document.getElementById('btn-company');
const btnSimpan = document.getElementById('btn-simpan');
const list = document.querySelectorAll('.list-group-item');
const input = document.querySelectorAll("input");
const textarea = document.querySelectorAll("textarea");

// btnCompany.addEventListener('click', (e) => {
//   e.preventDefault();
//   if (btnCompany.innerHTML == '<b>Edit</b>' && btnCompany.classList.contains('btn-primary')) {
//       for (let i = 0; i < input.length; i++) {
//          input[i].removeAttribute('disabled');
//       }
//       for (let i = 0; i < textarea.length; i++) {
//          textarea[i].removeAttribute('disabled');
//       }
//       btnCompany.innerHTML = '<b>Simpan</b>';
//       btnCompany.classList.remove('btn-primary');
//       btnCompany.classList.add('btn-success');
//   } else if (btnCompany.innerHTML == '<b>Simpan</b>' && btnCompany.classList.contains('btn-success')) {
//       for (let i = 0; i < input.length; i++) {
//          input[i].setAttribute('disabled', 'disabled');
//       }
//       for (let i = 0; i < textarea.length; i++) {
//          textarea[i].setAttribute('disabled', 'disabled');
//       }
//       btnCompany.innerHTML = '<b>Edit</b>';
//       btnCompany.classList.remove('btn-success');
//       btnCompany.classList.add('btn-primary');
//       window.location.href= "company_ubah_data";
//   }
// });

btnCompany.addEventListener('click', (e) => {
   e.preventDefault();
      for (let i = 0; i < input.length; i++) {
         input[i].removeAttribute('disabled');
      }
      for (let i = 0; i < textarea.length; i++) {
         textarea[i].removeAttribute('disabled');
      }
      btnCompany.classList.add('hide');
      btnSimpan.classList.remove('hide');
      btnSimpan.classList.add('show');
});

const btnMitra = document.getElementById('btn-mitra');
const btnSimpanMitra = document.getElementById('btn-simpan-mitra');
const listMitra = document.querySelectorAll('.list-group-item');
const inputMitra = document.querySelectorAll("input");
const textareaMitra = document.querySelectorAll("textarea");

btnMitra.addEventListener('click', (e) => {
   e.preventDefault();
      for (let i = 0; i < input.length; i++) {
         input[i].removeAttribute('disabled');
      }
      for (let i = 0; i < textarea.length; i++) {
         textarea[i].removeAttribute('disabled');
      }
      btnMitra.classList.add('hide');
      btnSimpanMitra.classList.remove('hide');
      btnSimpanMitra.classList.add('show');
});




















