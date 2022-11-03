$(function () {
  "use strict";

  function tinymceInit(selectorId) {
    return tinymce.init({
      selector: selectorId,
      height: 250,
      theme: "silver",
      plugins: [""],
      toolbar1:
        "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist",
      toolbar2: "",
      image_advtab: true,
      templates: [],
      content_css: [],
    });
  }

  //Tinymce editor
  if ($("#visi").length) {
    tinymceInit("#visi");
  }

  if ($("#misi").length) {
    tinymceInit("#misi");
  }

  if ($("#tentang-kami").length) {
    tinymceInit("#tentang-kami");
  }

  if ($("#sejarah").length) {
    tinymceInit("#sejarah");
  }
});
