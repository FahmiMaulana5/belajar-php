<?php
    echo "
        <marquee>
            <h1> Fahmi Maulana - Siswa</h1>
        </marquee>
    ";
    //variable
    $nama = "Fahmi Maulana";
    $kelas = "XI RPL 2";
    $nilai = 99.99;

    //
    echo "nama : ".$nama;
    echo "<br>";
    echo "kelas: ".$kelas;
    echo "<br>";
    echo "nilai : $nilai";
    echo "<br>";

    //Operator Jumlah
    echo "<br><br>";
    $angka1 = 5;
    $angka2 = 10;

    $hasil = $angka1 + $angka2;
    echo "Hasil dari penjumlahan : $hasil";

    //Rumus Luas Segitiga
    echo "<br><br>";
    $alas = 8;
    $tinggi = 20;

    $rumus = 0.5 * $alas * $tinggi;
    echo "Hasil rumus : $rumus";

    //Rumus lingkaran
    echo "<br><br>";
    $phi =3.14;
    $r= 7;

    $lingkaran =$phi * $r * $r ;

    echo "Hasil Luas lingkaran : $lingkaran";

    //Rumus volume balok
    echo "<br><br>";
    $p= 18;
    $l= 12;
    $t= 9;

    $volume_balok = $p * $l * $t;
    echo "Hasil Volume Balok : $volume_balok";
?>