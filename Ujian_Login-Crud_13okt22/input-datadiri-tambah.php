<div class='container'>
    <h1>Tambah Data</h1>
    <form action="input-datadiri-tambah.php" method="POST">
        
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class='form-control' type="number" name="nis" placeholder="Ex. 12003102" /><br>

      <label for="nama">Nama Lengkap :</label><br>
      <input class='form-control' type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

      <label for="tanggal_lahir">Kelas :</label><br>
      <input class='form-control' type="text" name="kelas" placeholder="11 RPL 2"/><br>

      <label for="nilai">Nilai Kehadiran:</label><br>
      <input class='form-control' type="number" name="kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Tugas:</label><br>
      <input class='form-control' type="number" name="tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UTS:</label><br>
      <input class='form-control' type="number" name="uts" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UAS:</label><br>
      <input class='form-control' type="number" name="uas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class='btn btn-success btn-sm' type="submit" name="simpan" value="Simpan Data" />
      <a class='btn btn-success btn-sm' href="input-datadiri.php">Kembali</a>
    </form>
</div>

<?php
include ('./input-config.php');
if ($_SESSION["login"] != TRUE) {
    header('location:login.php');
}

if ($_SESSION["role"] != "walas") {
    echo "
    <script>
         alert('Akses tidak diberikan, kamu bukan walas');
         window.location='input-datadiri.php';
         </script>
    ";
    }

 if(isset($_POST["simpan"])){
    $nis = $_POST["nis"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $kelas = $_POST["kelas"];
    $kehadiran = $_POST["kehadiran"];
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    /*echo $nis . "<br>";
    echo $nama . "<br>";
    echo $tanggal_lahir . "<br>";
    echo $nilai . "<br>";*/

    // CREATE - Menambahkan Data ke Database
    $query = "INSERT INTO nilai VALUES ('$nis', '$nama_lengkap', '$kelas', '$kehadiran', '$tugas', '$uts', '$uas');";
    echo $query;
    $insert = mysqli_query($mysqli, $query);

    if ($insert){
        echo "
        <script>
         alert('Data berhasil ditambahkan');
         window.location='input-datadiri.php';
         </script>
        ";
    }
}
?>