<div class="container">
  <?php 
    $start_date = date("Y-07");
    $months = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
    $month_count = 36;
    
    // for ($i = 0; $i < $month_count; $i++) {
    //     $end_date = date('Y-m', strtotime(+$i . 'month', strtotime($start_date)));
    //     $month_number = date('m', strtotime($end_date));
    //     $month_name = $months[$month_number];
    //     $year = date('Y', strtotime($end_date));
        
    //     echo $end_date . ' tanggal akhir </br>';
    //     echo $month_number . ' nomor bulan </br>';
    //     echo $month_name . ' nama bulan </br>';
    //     echo $year . ' tahun </br>';
    //     echo $month_name . ' ' . $year . '</br></br>';
    // }

    echo date('Y');
    echo date('Y') + 1;
    echo date('Y') + 2;
  ?>
</div>