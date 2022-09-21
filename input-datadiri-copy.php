
<?php 
      include('./input-config-copy.php');
      echo "<a href='input-datadiri-tambah-copy.php'>Tambah Data</a>";
      echo "<hr>";
      // READ - Menampilkan data dari database
      $no = 1;
      
      $tabledata = "";
      
      $data = mysqli_query($mysqli, " SELECT * FROM nilai ");
      while($row = mysqli_fetch_array($data)){
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
                        <td>
                              <a href='input-datadiri-edit-copy.php?nis=".$row["nis"]."'>Edit</a>
                              &nbsp;-&nbsp;
                              <a href='input-datadiri-hapus-copy.php?nis=".$row["nis"]."' 
                              onclick='return confirm(\"Yakin Kidssss ?\");'>Hapus</a>
                        </td>
                  </tr>
            ";
            $no++;
      }

      echo "
            <table cellpadding=5 border=1 cellspacing=0>
                  <tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Nilai Kehadiran</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Aksi</th>
                  </tr>
                  $tabledata
            </table>
      ";
?>
