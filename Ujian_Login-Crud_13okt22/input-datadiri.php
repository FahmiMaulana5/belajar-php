<?php
    include('./input-config.php');
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
    }

    echo "<div class='container'>";
    
        echo "Selamat Datang, " . $_SESSION["username"] . "<br>";
        echo "Anda sebagai : " . $_SESSION["role"];
        echo " - ";
        echo "<a class='btn btn-secondary btn-sm' href='logout.php'>Logout</a>";
        echo " <hr>";
        echo "<a class='btn btn-primary btn-sm' href='input-datadiri-tambah.php'>Tambah Data</a>";
        echo "&nbsp;-&nbsp;";
        echo "<a class='btn btn-warning btn-sm' href='input-datadiri-pdf.php'>Download PDF</a>";
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
                              <a href='input-datadiri-edit.php?nis=".$row["nis"]."'>Edit</a>
                              &nbsp;-&nbsp;
                              <a href='input-datadiri-hapus.php?nis=".$row["nis"]."' 
                              onclick='return confirm(\"Yakin Kidssss ?\");'>Hapus</a>
                        </td>
                  </tr>
            ";
            $no++;
        }
        
            echo "
            <table class='table table-Info table-bordered table-striped'>
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
    echo"</div>";
?>    