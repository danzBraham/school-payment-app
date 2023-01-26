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
  border: 1px soild var(--third-color);
  color: var(--text);
  cursor: pointer;
}

.container button:hover {
  background-color: var(--third-color);
}

.add-btn a button {
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

.add-form {
  display: none;
}

.add-form:target {
  display: block;
  width: 40%;
}

.add-form textarea {
  font-size: 16px;
  padding: 10px;
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
  margin-bottom: 13px;
}

.input-box select {
  padding: 8px 12px;
  border-radius: 8px;
}

td h2 {
  text-align: center;
  color: #232323;
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