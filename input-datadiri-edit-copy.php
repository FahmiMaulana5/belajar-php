<?php
      if ( isset($_GET["nis"]) ){
            $nis = $_GET["nis"];
            $check_nis = "SELECT * FROM nilai WHERE nis = '$nis'; ";
            include('./input-config-copy.php');
            $query = mysqli_query($mysqli, $check_nis);
            $row = mysqli_fetch_array($query);
      }
?>
<h1>Edit Data</h1>
<form action="input-datadiri-edit-copy.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102" readonly/><br>

      <label for="nama">Nama Lengkap :</label><br>
      <input value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

      <label for="tanggal_lahir">Kelas :</label><br>
      <input value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="11 RPL 2"/><br>

      <label for="nilai">Nilai Kehadiran:</label><br>
      <input value="<?php echo $row["kehadiran"]; ?>" type="number" name="kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Tugas:</label><br>
      <input value="<?php echo $row["tugas"]; ?>" type="number" name="tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UTS:</label><br>
      <input value="<?php echo $row["uts"]; ?>" type="number" name="uts" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UAS:</label><br>
      <input value="<?php echo $row["uas"]; ?>" type="number" name="uas" placeholder="Ex. 80.56" /><br>
      <br>
      <input type="submit" name="edit" value="Edit Data" />
      <a href="input-datadiri-copy.php">Kembali</a>
</form>

<?php
      if ( isset($_POST["edit"]) ) {
            $nis = $_POST["nis"];
            $nama_lengkap = $_POST["nama_lengkap"];
            $kelas = $_POST["kelas"];
            $kehadiran = $_POST["kehadiran"];
            $tugas = $_POST["tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];

            // EDIT - Memperbaharui Data
            $query = "
                  UPDATE nilai SET nama_lengkap = '$nama_lengkap', 
                  kelas = '$kelas',
                  kehadiran = '$kehadiran',
                  tugas = '$tugas', 
                  uts = '$uts', 
                  uas = '$uas'
                  WHERE nis = '$nis';
            ";
            
            include ('./input-config-copy.php');
            $update = mysqli_query($mysqli, $query);

            if($update){
                  echo "
                        <script>
                        alert('Data berhasil diperbaharui');
                        window.location='input-datadiri-copy.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-datadiri-edit-copy.php?nis=$nis';
                        </script>
                  ";
            }
      }
?>