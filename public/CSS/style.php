<?php header("Content-Type: text/css");
?>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  font-family: 'Poppins', sans-serif;
  --main-color: #36304A;
  --second-color: #635888;
  --third-color: #9990B7;
  --fourth-color: #201C2B;
  --text: #efefef;
}

html {
  scroll-behavior: smooth;
  height: 100%;
}

nav {
  position: fixed;
  width: 100%;
  padding: 20px 50px;
  background-color: var(--main-color);
  font-size: 18px;
}

nav ul {
  display: flex;
  align-items: center;
  gap: 30px;
}

nav ul li {
  display: inline-block;
}

nav ul li a {
  text-decoration: none;
  color: var(--text);
}

nav ul li a:hover {
  text-decoration: underline;
}

nav ul li:last-child {
  background-color: #ef4444;
  padding: 0 10px 2px;
  border-radius: 6px;
  margin-left: auto;
}

nav ul li:last-child:hover {
  background-color: #b91c1c;
}

nav ul li:last-child a:hover {
  text-decoration: none;
}

.container {
  padding: 85px 50px 50px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.container-login {
  height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container-login form {
  width: 400px;
  font-size: 20px;
  font-weight: 600;
  padding: 20px;
  background-color: var(--third-color);
  border-radius: 10px;
}

.container input {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 16px;
  border: 1px solid var(--fourth-color);
}

.container option:nth-child(even) {
  background-color: #eee;
}

.container button {
  padding: 8px 12px;
  background-color: var(--second-color);
  border-radius: 8px;
  font-size: 16px;
  border: none;
  color: var(--text);
  cursor: pointer;
  outline: none;
}

.container button span {
  font-weight: 600;
}

.container button:hover {
  background-color: var(--third-color);
}

.container .add-btn, .container-btn button {
  width: fit-content;
  padding: 14px;
  font-size: 16px;
}

.container .add-btn span {
  font-weight: 600;
}

.alert {
  width: 100%;
  padding: 10px 20px;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 18px;
}

.alert-success {
  background-color: #bbf7d0;
}

.alert-failed {
  background-color: #fecaca;
}

.close-btn-alert {
  cursor: pointer;
}

table, tr, td, th {
  /* border: 1px solid #fff; */
  border: 1px solid #000;
  border-collapse: collapse;
  padding: 6px 12px;
}

table {
  border-radius: 8px;
  overflow: hidden;
}

thead {
  background-color: #36304A;
  color: #fff;
}

tbody {
  background-color: var(--text);
}

table .no-data {
  text-align: center;
  font-weight: 600;
  font-size: 20px;
  padding: 15px;
}

table .aksi {
  width: 200px;
  text-align: center;
}

table .aksi a button {
  /* padding: 6px 12px; */
  font-weight: 600;
  width: 80px;
}

table .aksi .edit-btn {
  background-color: var(--third-color);
  color: var(--text);
}

table .aksi .edit-btn:hover {
  background-color: hsl(254, 21%, 44%);
}

table .aksi .delete-btn {
  background-color: #EF4444;
  color: var(--text);
}

table .aksi .delete-btn:hover {
  background-color: hsl(0, 84%, 40%);
  color: var(--text);
}

.overlay {
  position: absolute;
  visibility: hidden;
  backdrop-filter: blur(5px);
  opacity: 0;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.7);
  transition: all 300ms ease-in-out;
}

.overlay.click {
  visibility: visible;
  opacity: 1;
}

.close-btn img {
  position: absolute;
  top: -20px;
  right: -20px;
  cursor: pointer;
}

form {
  display: flex;
  flex-direction: column;
  gap: 13px;
}

.form-edit {
  display: flex;
  justify-content: center;
  align-items: center;
}

.search-form {
  display: flex;
  flex-direction: row;
  gap: 6px;
}

.search-form select {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 16px;
  border: 1px solid var(--fourth-color);
}

.modal {
  position: relative;
  display: none;
  opacity: 0;
  background-color: var(--third-color);
  padding: 20px;
  border-radius: 10px;
  font-weight: 600;
  width: 40%;
  transition: all 300ms ease-in-out;
}

.modal.click, .modal.modal-kelas, .modal.modal-bulan, .modal.modal-siswa {
  display: flex;
  opacity: 1;
}

.modal .input-box input, .container-login input {
  padding: 8px 12px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box select {
  padding: 8px 12px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box textarea {
  padding: 8px 12px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box input:focus,
.modal .input-box select:focus,
.modal .input-box textarea:focus,
.container-login input:focus {
  outline: 1px solid var(--text);
}

.modal button, .container-login button {
  width: 100%;
  padding: 8px 12px;
  background-color: var(--fourth-color);
  color: var(--text);
  border-radius: 8px;
  font-weight: 500;
  font-size: 18px;
  cursor: pointer;
  align-self: end;
  border: none;
}

.modal button:hover {
  background-color: var(--main-color);
}

.info {
  background-color: #fff3cd;
  width: 100%;
  text-align: center;
  margin: auto;
  padding: 10px 25px;
  border-radius: 10px;
  color: #232323;
}

.container-pembayaran {
  display: grid;
  grid-template-columns: 1fr 2.7fr;
  gap: 50px;
  overflow: hidden;
}

.input-box {
  display: flex;
  gap: 3px;
  flex-direction: column;
}

.input-box select {
  padding: 8px 12px;
  border-radius: 8px;
}

.history-siswa table, tr {
  width: 100%;
}

.total {
  background-color: var(--main-color);
  color: var(--text);
  text-align: center;
  font-weight: 500;
  font-size: 1.2rem;
}

.total-tagihan {
  font-weight: 500;
}

@media print {
  .print {
    display: none;
  }
}