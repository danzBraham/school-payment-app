<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const modal = document.querySelector("#modal");
  const overlay = document.querySelector("#overlay");
  const closeBtn = document.querySelector("#close-btn");

  addBtn.addEventListener("click", function () {
    overlay.classList.add('click');
    modal.classList.add('click');
  });

  closeBtn.addEventListener("click", function () {
    overlay.classList.remove('click');
    modal.classList.remove('click');
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      overlay.classList.remove('click');
    modal.classList.remove('click');
    }
  });
});
