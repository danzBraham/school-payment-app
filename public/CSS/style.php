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

body {
  background-color: #dee2e6;
}

nav {
  position: fixed;
  width: 100%;
  padding: 0 50px;
  background-color: var(--main-color);
  font-size: 16px;
}

nav ul {
  display: flex;
  align-items: center;
  gap: 5px;
}

nav ul li {
  display: block;
  padding: 20px 30px;
}

nav ul li:hover {
  display: block;
  padding: 20px 30px;
  background-color: var(--second-color);
}

nav ul li a {
  text-decoration: none;
  color: var(--text);
}

nav ul li a:hover {
  color: #dedede;
}

nav ul li.logout {
  background-color: #ef4444;
  padding: 0 10px 2px;
  border-radius: 6px;
  margin-left: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

nav ul li.logout:hover {
  background-color: #b91c1c;
}

nav ul li.logout a {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

header h2 {
  font-size: 32px;
  color: var(--fourth-color);
}

header h2 span {
  color: #4B3399;
}

.container {
  padding: 85px 50px 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.container-login {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: var(--fourth-color);
  background: url(../Assets/Icon/background.png);
}

.container-login::after {
  content: '';
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.2) 0%, #000000 100%);
}

.container-login .container-form-login {
  display: flex;
  position: relative;
  z-index: 2;
  top: -20px;
  background-color: var(--fourth-color);
  border-radius: 8px;
  overflow: hidden;
}

.container-login .container-form-login .wrapper {
  padding: 70px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 30px;
  background-color: #fff;
}

.container-login .container-form-login span {
  color: #6483F2;
}

.container-login .container-form-login form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  width: 100%;
}

.container-login .container-form-login form label {
  font-size: 16px;
}

.container-login .container-form-login form input {
  padding: 6px 8px;
  border-radius: 6px;
  border: 2px solid var(--fourth-color);
}

.container-login .container-form-login form button {
  width: 100%;
  padding: 8px 12px;
  border: none;
  background-color: var(--fourth-color);
  color: var(--text);
  border-radius: 6px;
  font-size: 14px;
  transition: all 100ms ease-out;
}

.container-login .container-form-login form button:hover {
  background-color: var(--main-color);
}

.container-login .container-form-login form button:active {
  transform: scale(0.98);
}

.container-login .container-form-login .img {
  background-color: var(--fourth-color);
  padding: 70px 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.hero {
  padding: 10px 0;
  display: flex;
  justify-content: space-between;
}

.hero h1 {
  font-size: 36px;
}

.hero .main-hero {
  height: fit-content;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.hero .wrapper-box {
  width: fit-content;
  display: flex;
  gap: 20px;
  align-items: center;
}

.hero .box-data {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  gap: 15px;
  background-color: var(--third-color);
  border-radius: 16px;
  box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.15);
}

.hero .box-data .icon {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 8px;
  background-color: #D9D9D9;
  border-radius: 6px;
}

.hero .box-data span {
  display: inline-block;
  width: 2px;
  height: 50px;
  background-color: #121212;
}

.hero .box-data .info-total {
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: var(--text);
}

.hero .box-data .info-total h3 {
  font-size: 20px;
  font-weight: 500;
}

.hero .box-data .info-total p {
  font-size: 18px;
}

.container .transaksi-table p {
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 10px;
}

.container .transaksi-table table {
  width: 100%;
}

.container input {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 13px;
  border: 1px solid var(--fourth-color);
}

.container option:nth-child(even) {
  background-color: #eee;
}

.container button {
  padding: 8px 12px;
  background-color: var(--second-color);
  border-radius: 8px;
  font-size: 13px;
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
  font-size: 13px;
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
  font-size: 16px;
  box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.1);
}

.alert-success {
  background-color: #bbf7d0;
}

.alert-failed {
  background-color: #fecaca;
}

.alert-login {
  position: absolute;
  top: 30px;
  left: 0;
  right: 0;
  margin: auto;
  z-index: 3;
  width: fit-content;
  padding: 10px 14px;
  border-radius: 6px;
  display: flex;
  font-size: 18px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  background-color: #fca5a5;
}


.close-btn-alert {
  cursor: pointer;
}

.table-wrapper {
  height: 434px;
}

table {
  width: 100%;
}

table, tr, td, th {
  font-size: 13px;
  border-top: 1px solid #121212;
  border-bottom: 1px solid #121212;
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
  background-color: #f8f9fa;
}

tbody tr:hover {
  background-color: #cdcdcd;
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
  padding: 6px 12px;
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

.pagination {
  font-size: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px;
}

.pagination a {
  background-color: var(--second-color);
  color: var(--text);
  padding: 4px 8px;
  border-radius: 4px;
  text-decoration: none;
  transition: all 100ms ease-out;
}

.pagination a:hover {
  background-color: var(--fourth-color);
  /* background-color: #fff;
  color: #4B3399; */
}

.pagination span {
  background-color: #fff;
  border: 1px solid var(--main-color);
  color: #4B3399;
  font-weight: 500;
  padding: 4px 8px;
  border-radius: 4px;
  cursor: default;
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
  top: 20px;
  right: 20px;
  cursor: pointer;
}

form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.form-edit {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: var(--fourth-color);
}

.container-form {
  width: 435px;
  padding: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 5px;
  position: relative;
  top: -30px;
}

.container-form a {
  align-self: flex-start;
  display: flex;
  gap: 5px;
  color: var(--text);
  text-decoration: none;
}

.container-form a:hover {
  color: #fff;
  filter: brightness(1.5);
}

.container-form a img {
  transform: inherit;
  transition: all 300ms ease-out;
}

.container-form a:hover img {
  filter: brightness(1.5);
  transform: translate(-5px);
}

.container-form form {
  width: 100%;
}

.search-form {
  display: flex;
  flex-direction: row;
  gap: 6px;
}

hr {
  border: none;
  border-radius: 6px;
  height: 3px;
  background-color: #121212;
}

.search-form select {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 13px;
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

.modal.click, .modal.modal-kelas, .modal.modal-siswa {
  display: flex;
  opacity: 1;
}

.modal .input-box input {
  padding: 6px 8px;
  font-size: 14px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box label {
  font-size: 16px;
}

.modal .input-box select {
  padding: 6px 8px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box textarea {
  padding: 8px;
  font-size: 14px;
  border-radius: 8px;
  border: 3px solid var(--fourth-color);
}

.modal .input-box input:focus,
.modal .input-box select:focus,
.modal .input-box textarea:focus,
.container-login input:focus {
  outline: 1px solid var(--text);
}

.modal button {
  width: 100%;
  padding: 8px 12px;
  background-color: var(--fourth-color);
  color: var(--text);
  border-radius: 8px;
  font-weight: 500;
  font-size: 16px;
  cursor: pointer;
  align-self: end;
  border: none;
}

.modal button:hover {
  background-color: var(--main-color);
}

.info {
  background-color: var(--main-color);
  width: 100%;
  text-align: center;
  font-size: 28px;
  margin: auto;
  padding: 10px 25px;
  border-radius: 10px;
  color: var(--text);
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
}

.total-tagihan {
  font-weight: 500;
}