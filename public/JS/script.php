<?php header('Content-Type: text/javascript'); ?>
document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.querySelector("#add-btn");
  const editBtn = document.querySelectorAll(".edit-btn");
  const modalAdd = document.querySelector("#modal-add");
  const modalEdit = document.querySelector("#modal-edit");
  const overlay = document.querySelector("#overlay");
  const closeBtn = document.querySelectorAll(".close-btn");

  addBtn.addEventListener("click", function () {
    overlay.classList.add('click');
    modalAdd.classList.add('click');
  });

  editBtn.forEach((e) => {
    e.addEventListener("click", function() {
      overlay.classList.add('click');
      modalEdit.classList.add('click');
  
      const id = this.dataset.id;

      fetch('http://localhost/school-payment-app/public/siswa/ubah', {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ id })
      })
        .then((res) => res.json())
        .then((data) => {
          document.querySelector("#nama-edit").value = data.nama;
          document.querySelector("#password-edit").value = data.password;
          document.querySelector("#kelas-edit").innerHTML = data.kelas;
          document.querySelector("#telp-edit").value = data.no_telp;
          document.querySelector("#alamat-edit").value = data.alamat;
        })
        .catch((error) => console.error(error));
    })
  });

  closeBtn.forEach((e) => {
    e.addEventListener("click", () => {
      overlay.classList.remove('click');
      modalAdd.classList.remove('click');
      modalEdit.classList.remove('click');
    })
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      overlay.classList.remove('click');
      modalAdd.classList.remove('click');
      modalEdit.classList.remove('click');
    }
  });
});
