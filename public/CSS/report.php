<?php header("Content-Type: text/css");
?>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  font-family: 'Poppins', sans-serif;
}

.container-laporan {
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 50px;
}

.container-laporan .laporan {
  width: 80%;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.container-laporan .laporan-info {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.container-laporan .laporan-info p {
  font-size: 20px;
  font-weight: 600;
}

.container-laporan table {
  width: 100%;
}

table, tr, th, td {
  border: 1px solid #121212;
  border-collapse: collapse;
  padding: 6px;
}

table thead, table tr:last-child {
  color: #121212;
  font-weight: 700;
}

table tr td:first-child {
  text-align: center;
}

.container-laporan .tertanda {
  margin-top: 50px;
  height: 150px;
  align-self: flex-end;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}