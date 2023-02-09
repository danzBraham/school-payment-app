<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const laporanKlsBtn = document.querySelector("#laporan-kelas-btn");
  const laporanBlnBtn = document.querySelector("#laporan-bulan-btn");
  const laporanSiswaBtn = document.querySelector("#laporan-siswa-btn");
  const modal = document.querySelector("#modal");
  const modalKls = document.querySelector("#modal-kelas");
  const modalBln = document.querySelector("#modal-bulan");
  const modalSiswa = document.querySelector("#modal-siswa");
  const overlay = document.querySelector("#overlay");
  const closeBtn = document.querySelectorAll("#close-btn");
  const alert = document.querySelector("#alert");
  const closeBtnAlert = document.querySelector("#close-btn-alert");

  const handleModal = (el) => {
    overlay.classList.add('click');
    el.classList.add('click');
  }
  
  const handleCloseModal = (el) => {
    overlay.classList.remove('click');
    el.classList.remove('click');
  }

  if (addBtn) {
    addBtn.addEventListener("click", function () {
      handleModal(modal);
    });

    const closeBtn = document.querySelector("#close-btn");
    closeBtn.addEventListener("click", () => {
      handleCloseModal(modal);
    });
  }

  const handleLaporan = (el) => {
    modalKls.classList.remove('modal-kelas');
    modalBln.classList.remove('modal-bulan');
    modalSiswa.classList.remove('modal-siswa');
    handleModal(el);
  }

  if (laporanKlsBtn) {
    laporanKlsBtn.addEventListener('click', () => {
      handleLaporan(modalKls);
    });
  }

  if (laporanBlnBtn) {
    laporanBlnBtn.addEventListener('click', () => {
      handleLaporan(modalBln);
    });
  }

  if (laporanSiswaBtn) {
    laporanSiswaBtn.addEventListener('click', () => {
      handleLaporan(modalSiswa);
    });
  }

  if(closeBtn){
    closeBtn.forEach(el => {
      el.addEventListener("click", () => {
        handleCloseModal(modalKls);
        handleCloseModal(modalBln);
        handleCloseModal(modalSiswa);
      });
    })
  }

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      handleCloseModal(modal);
    }
  });

  closeBtnAlert.addEventListener('click', () => {
    const parent = alert.parentNode;
    parent.removeChild(alert);
  });
});
