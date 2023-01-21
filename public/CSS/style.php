<?php header("Content-Type: text/css"); ?>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  overflow: hidden;
}

:root {
  font-family: 'Poppins', sans-serif;
  --main-color: #36304A;
}

html {
  scroll-behavior: smooth;
}

nav {
  padding: 20px 50px;
  background-color: var(--main-color);
}

nav ul {
  display: flex;
  gap: 20px;
}

nav ul li {
  display: inline-block;
}

nav ul li a {
  text-decoration: none;
  color: #efefef;
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
}

.container button {
  padding: 8px 12px;
}

table, tr, td, th {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 6px 12px;
}

table {
  border-radius: 8px;
}

thead {
  background-color: #36304A;
  color: #fff;
}

tbody {
  background-color: #efefef;
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
  grid-template-columns: 1fr 3fr;
  gap: 15px;
}

.input-box {
  display: flex;
  gap: 3px;
  flex-direction: column;
  margin-bottom: 13px;
}

.input-box input {
  max-width: 100%;
}

.history-siswa h1 {
  text-align: center;
  border: 3px solid red;
}