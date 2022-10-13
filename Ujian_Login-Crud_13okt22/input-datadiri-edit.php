<?php
include ('./input-config.php');
if ($_SESSION["login"] != TRUE) {
    header('location:login.php');
}

if(isset($_GET["nis"])){
    $nis = $_GET["nis"];
    $check_nis = "SELECT * FROM nilai WHERE nis = '$nis';";
    $query = mysqli_query($mysqli, $check_nis);
    $row = mysqli_fetch_array($query);
}
?>
<div class='container'>
<form action="input-datadiri-edit.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class='form-control' value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102" readonly/><br>

      <label for="nama">Nama Lengkap :</label><br>
      <input class='form-control' value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

      <label for="tanggal_lahir">Kelas :</label><br>
      <input class='form-control' value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="11 RPL 2"/><br>

      <label for="nilai">Nilai Kehadiran:</label><br>
      <input class='form-control' value="<?php echo $row["kehadiran"]; ?>" type="number" name="kehadiran" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai Tugas:</label><br>
      <input class='form-control' value="<?php echo $row["tugas"]; ?>" type="number" name="tugas" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UTS:</label><br>
      <input class='form-control' value="<?php echo $row["uts"]; ?>" type="number" name="uts" placeholder="Ex. 80.56" /><br>

      <label for="nilai">Nilai UAS:</label><br>
      <input class='form-control' value="<?php echo $row["uas"]; ?>" type="number" name="uas" placeholder="Ex. 80.56" /><br>
      <br>
      <input class='btn btn-success btn-sm' type="submit" name="edit" value="Edit Data" />
      <a class='btn btn-success btn-sm' href="input-datadiri-copy.php">Kembali</a>
</form>
</div>
<?php

if(isset($_POST["edit"])){
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
     
     $update = mysqli_query($mysqli, $query);

     if($update){
        echo "
        <script>
        alert('Data berhasil diperbaharui');
        window.location='input-datadiri.php';
        </script>
        
        ";
     }else{
        echo "
        <script>
        alert('Data berhasil diperbaharui');
        window.location='input-datadiri-edit.php?nis=$nis';
        </script>
        ";  
     }
}