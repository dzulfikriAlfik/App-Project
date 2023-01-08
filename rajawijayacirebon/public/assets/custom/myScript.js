const btnMitra = document.getElementById("btn-mitra");
const btnSimpanMitra = document.getElementById("btn-simpan-mitra");
const listMitra = document.querySelectorAll(".list-group-item");
const inputMitra = document.querySelectorAll("input");
const textareaMitra = document.querySelectorAll("textarea");

if (btnMitra) {
  btnMitra.addEventListener("click", (e) => {
    e.preventDefault();
    for (let i = 0; i < input.length; i++) {
      input[i].removeAttribute("disabled");
    }
    for (let i = 0; i < textarea.length; i++) {
      textarea[i].removeAttribute("disabled");
    }
    btnMitra.classList.add("hide");
    btnSimpanMitra.classList.remove("hide");
    btnSimpanMitra.classList.add("show");
  });
}
