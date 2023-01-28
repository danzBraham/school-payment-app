<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const modal = document.querySelector("#modal");

  addBtn.addEventListener("click", function () {
    modal.style.display = "flex";
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      modal.style.display = "none";
    }
  });
});
