<?php header("Content-Type: text/css");
?>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
}

.layer {
  width: 100%;
  height: 100%;
  background-color: #222;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
}

.container-laporan {
  padding: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 50px;
}

.container-laporan .laporan {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.container-laporan .laporan-info {
  font-weight: 600;
}

.container-laporan table {
  width: 100%;
}

table, tr, th, td {
  border: 1px solid #121212;
  border-collapse: collapse;
  padding: 4px;
  font-size: 10px;
}

table thead, table .information {
  color: #121212;
  font-weight: 700;
}

table tr td:first-child {
  text-align: center;
}

.container-laporan .footer {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.container-laporan .footer .tertanda {
  height: 110px;
  align-self: flex-end;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}

@media print {
  .layer {
    display: none;
  }

  .container-laporan {
    padding: 50px;
  }
}

@page {
  margin: -1px;
  size: landscape;
}