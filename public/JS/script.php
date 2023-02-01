<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const modalAdd = document.querySelector("#modal-add");
  const overlay = document.querySelector("#overlay");
  const closeBtn = document.querySelectorAll(".close-btn");

  addBtn.addEventListener("click", function () {
    overlay.classList.add('click');
    modalAdd.classList.add('click');
  });

  closeBtn.forEach((e) => {
    e.addEventListener("click", () => {
      overlay.classList.remove('click');
      modalAdd.classList.remove('click');
    })
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      overlay.classList.remove('click');
      modalAdd.classList.remove('click');
    }
  });
});
