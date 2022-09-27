<?php
      if ( isset($_GET["kodebarang"]) ){
            $kodebarang = $_GET["kodebarang"];
            $check_nis = "SELECT * FROM transaksi WHERE kodebarang = '$kodebarang'; ";
            include('./kwu-config.php');
            $query = mysqli_query($mysqli, $check_nis);
            $row = mysqli_fetch_array($query);
      }
?>
<h1>Edit Data</h1>
<form action="kwu-edit.php" method="POST">
      <label for="kodebarang">Kode Barang :</label><br>
      <input value="<?php echo $row["kodebarang"]; ?>" type="number" name="kodebarang"  readonly/><br>

      <label for="tanggal">Tanggal :</label><br>
      <input value="<?php echo $row["tanggal"]; ?>" type="date" name="tanggal" /><br>

      <label for="pembeli">Pembeli :</label><br>
      <input value="<?php echo $row["pembeli"]; ?>" type="text" name="pembeli" placeholder="Ex. Firdaus" /><br>

      <label for="namabarang">Nama Barang :</label><br>
      <input value="<?php echo $row["namabarang"]; ?>" type="text" name="namabarang" placeholder="Ex. Aqua" /><br>
      
      <label for="qty">Qty :</label><br>
      <input value="<?php echo $row["qty"]; ?>" type="number" name="qty" placeholder="Ex. 1" /><br>

      <label for="hargabeli">Harga Beli :</label><br>
      <input value="<?php echo $row["hargabeli"]; ?>" type="number" name="hargabeli" placeholder="Ex. 12000" /><br>

      <label for="hargajual">Harga Jual :</label><br>
      <input value="<?php echo $row["hargajual"]; ?>" type="number" name="hargajual" placeholder="Ex. 15000" /><br>
      <br>

      <input type="submit" name="edit" value="Edit Data" />
      <a href="kwu.php">Kembali</a>
</form>

<?php
      if ( isset($_POST["edit"]) ) {
            $kodebarang = $_POST["kodebarang"];
            $tanggal = $_POST["tanggal"];
            $pembeli = $_POST["pembeli"];
            $namabarang = $_POST["namabarang"];
            $qty = $_POST["qty"];
            $hargabeli = $_POST["hargabeli"];
            $hargajual = $_POST["hargajual"];

            // EDIT - Memperbaharui Data
            $query = "
                  UPDATE transaksi SET tanggal = '$tanggal', 
                  pembeli = '$pembeli',
                  namabarang = '$namabarang',
                  qty = '$qty',
                  hargabeli = '$hargabeli',
                  hargajual = '$hargajual'
                  WHERE kodebarang = '$kodebarang';
            ";
            
            include ('./kwu-config.php');
            $update = mysqli_query($mysqli, $query);

            if($update){
                  echo "
                        <script>
                        alert('Data berhasil diperbaharui');
                        window.location='kwu.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='kwu-edit.php?kodebarang=$kodebarang';
                        </script>
                  ";
            }
      }
?>