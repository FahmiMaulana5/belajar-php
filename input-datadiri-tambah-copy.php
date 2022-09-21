<h1>Tambah Data</h1>
<form action="input-datadiri-tambah-copy.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input type="number" name="nis" placeholder="Ex. 12003102" /><br>

      <label for="nama">Nama Lengkap :</label><br>
      <input type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

      <label for="tanggal_lahir">Kelas :</label><br>
      <input type="text" name="kelas" placeholder="11 RPL 2"/><br>

      <label for="nilai">Nilai Kehadiran:</label><br>
      <input type="number" name="kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Tugas:</label><br>
      <input type="number" name="tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UTS:</label><br>
      <input type="number" name="uts" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UAS:</label><br>
      <input type="number" name="uas" placeholder="Ex. 80.56" /><br>
      <br>
      <input type="submit" name="simpan" value="Simpan Data" />
      <a href="input-datadiri-copy.php">Kembali</a>
</form>

<?php
      if( isset($_POST["simpan"]) ){
            $nis = $_POST["nis"];
            $nama_lengkap = $_POST["nama_lengkap"];
            $kelas = $_POST["kelas"];
            $kehadiran = $_POST["kehadiran"];
            $tugas = $_POST["tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO nilai VALUES
                  ('$nis', '$nama_lengkap', '$kelas', '$kehadiran', '$tugas', '$uts', '$uas');
            ";

            include ('./input-config-copy.php');
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='input-datadiri-copy.php';
                        </script>
                  ";
            }

      }
?>