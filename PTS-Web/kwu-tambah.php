<h1>Tambah Data</h1>
<form action="kwu-tambah.php" method="POST">
      <label for="kodebarang">Kode Barang :</label><br>
      <input type="number" name="kodebarang" placeholder="Ex. 1200310211" /><br>

      <label for="tanggal">Tanggal :</label><br>
      <input type="date" name="tanggal" /><br>

      <label for="pembeli">Pembeli :</label><br>
      <input type="text" name="pembeli" placeholder="Ex. Firdaus" /><br>

      <label for="namabarang">Nama Barang :</label><br>
      <input type="text" name="namabarang" placeholder="Ex. Aqua" /><br>
      
      <label for="qty">Qty :</label><br>
      <input type="number" name="qty" placeholder="Ex. 1" /><br>

      <label for="hargabeli">Harga Beli :</label><br>
      <input type="number" name="hargabeli" placeholder="Ex. 12000" /><br>

      <label for="hargajual">Harga Jual :</label><br>
      <input type="number" name="hargajual" placeholder="Ex. 15000" /><br>
      <br>

      <input type="submit" name="simpan" value="Simpan Data" />
      <a href="kwu.php">Kembali</a>
</form>

<?php
      if( isset($_POST["simpan"]) ){
            $kodebarang = $_POST["kodebarang"];
            $tanggal = $_POST["tanggal"];
            $pembeli = $_POST["pembeli"];
            $namabarang = $_POST["namabarang"];
            $qty = $_POST["qty"];
            $hargabeli = $_POST["hargabeli"];
            $hargajual = $_POST["hargajual"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO transaksi VALUES
                  ('$kodebarang', '$tanggal', '$pembeli', '$namabarang', '$qty', '$hargabeli', '$hargajual');
            ";

            include ('./kwu-config.php');
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='kwu.php';
                        </script>
                  ";
            }

      }
?>