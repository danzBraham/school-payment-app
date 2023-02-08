<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const laporanBtn = document.querySelectorAll('.laporan-btn');
  const modal = document.querySelector("#modal");
  const overlay = document.querySelector("#overlay");
  const closeBtn = document.querySelector("#close-btn");
  const alert = document.querySelector("#alert");
  const closeBtnAlert = document.querySelector("#close-btn-alert");

  if (addBtn) {
    addBtn.addEventListener("click", function () {
      overlay.classList.add('click');
      modal.classList.add('click');
    });

    closeBtn.addEventListener("click", () => {
      overlay.classList.remove('click');
      modal.classList.remove('click');
    });
  }

  if (laporanBtn) {
    laporanBtn.forEach((e) => {
      if (e) {
        e.addEventListener('click', function() {
          overlay.classList.add('click');
          modal.classList.add('click');
        });
      }
    });

    closeBtn.addEventListener("click", () => {
      overlay.classList.remove('click');
      modal.classList.remove('click');
    });
  }

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      overlay.classList.remove('click');
      modal.classList.remove('click');
    }
  });

  closeBtnAlert.addEventListener('click', () => {
    const parent = alert.parentNode;
    parent.removeChild(alert);
  });
});
