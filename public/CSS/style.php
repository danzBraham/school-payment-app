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
  padding: 20px 50px;
  background-color: var(--main-color);
  font-size: 20px;
}

nav ul {
  display: flex;
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

.container {
  padding: 20px 50px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.container input {
  padding: 8px 12px;
  border-radius: 8px;
  font-size: 16px;
  border: 1px solid var(--fourth-color);
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

.container button:hover {
  background-color: var(--third-color);
}

.container .add-btn {
  width: fit-content;
  padding: 14px;
  font-size: 16px;
}

table, tr, td, th {
  border: 1px solid black;
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

table .aksi {
  width: 200px;
  text-align: center;
}

table td h2 {
  text-align: center;
  color: #232323;
}

table .aksi a button {
  font-weight: 600;
  width: 80px;
}

table .aksi .edit-btn {
  background-color: var(--third-color);
  color: var(--text);
}

table .aksi .edit-btn:hover {
  background-color: hsl(254, 21%, 74%);
}

table .aksi .delete-btn {
  background-color: #EF4444;
  color: var(--text);
}

table .aksi .delete-btn:hover {
  background-color: hsl(0, 84%, 70%);
  color: var(--text);
}

.overlay {
  position: absolute;
  visibility: hidden;
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

.search-form {
  display: flex;
  flex-direction: row;
  gap: 4px;
}

.modal {
  position: relative;
  visibility: hidden;
  opacity: 0;
  background-color: var(--third-color);
  padding: 20px;
  border-radius: 10px;
  font-weight: 600;
  width: 40%;
  transition: all 300ms ease-in-out;
}

.modal.click {
  visibility: visible;
  opacity: 1;
}

.modal .input-box input {
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
.modal .input-box textarea:focus {
  outline: 1px solid var(--text);
}

.modal button {
  padding: 8px 12px;
  background-color: var(--fourth-color);
  color: var(--text);
  border-radius: 8px;
  font-weight: 500;
  font-size: 18px;
  cursor: pointer;
  width: fit-content;
  align-self: end;
  border: none;
}

.modal button:hover {
  background-color: var(--main-color);
}

.info {
  background-color: #fff3cd;
  width: fit-content;
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