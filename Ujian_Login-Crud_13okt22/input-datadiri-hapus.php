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

if(isset($_GET["nis"]) && $_SESSION["role"] == "walas"){
    $nis = $_GET["nis"];

    $query = "
     DELETE FROM nilai
     WHERE nis = '$nis';
    ";

    
    $update = mysqli_query($mysqli, $query);

    if($update){
        echo "
        <script>
        alert('Data berhasil dihapus');
        window.location='input-datadiri.php';
        </script>
        ";
    }
}
?>