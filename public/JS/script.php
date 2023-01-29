<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const modal = document.querySelector("#modal");
  const closeBtn = document.querySelector("#close-btn");

  addBtn.addEventListener("click", function () {
    modal.style.display = "flex";
  });

  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      modal.style.display = "none";
    }
  });
});
