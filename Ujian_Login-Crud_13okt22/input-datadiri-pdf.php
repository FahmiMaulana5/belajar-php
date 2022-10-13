<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./input-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM nilai ");
    while($row =mysqli_fetch_array($data)){
            $nilai_akhir = ($row["kehadiran"] + $row["tugas"] + $row["uts"] + $row["uas"]) / 4;
            $tabledata .= "
                  <tr>
                        <td>".$row["nis"]."</td>
                        <td>".$row["nama_lengkap"]."</td>
                        <td>".$row["kelas"]."</td>
                        <td>".$row["kehadiran"]."</td>
                        <td>".$row["tugas"]."</td>
                        <td>".$row["uts"]."</td>
                        <td>".$row["uas"]."</td>
                        <td>".$nilai_akhir."</td>
                  </tr>
            ";
            $no++;
     }
    
        $tanggal_cetak = date('d M Y - H:i:s');
        $table = "
            <h1>Laporan Data Diri Kelas</h1>
            <h6>Waktu Cetak : $tanggal_cetak</h6>
            <table width='100%' cellpadding=5 border=1 cellspacing=0>
                <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Nilai Kehadiran</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Nilai Akhir</th>
                  </tr>
                  $tabledata
            </table>
        ";

    $mpdf->WriteHTML($table);
    $mpdf->Output();
?>
