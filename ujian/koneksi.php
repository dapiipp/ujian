<?php 
$koneksi = new mysqli('localhost', 'root', '', 'hotel')
or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])){
    $idPesanan = $_POST['idPesanan'];
    $nmPemesan = $_POST['nmPemesan'];
    $noTelp = $_POST['noTelp'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("INSERT INTO hotel (idPesanan, nmPemesan, noTelp, jk, alamat) values ('$idPesanan', '$nmPemesan','$noTelp', '$jk', '$alamat');");

    header('location:hotel.php');
    
}


if (isset($_GET['idPesanan'])){
    $idPesanan = $_GET['idPesanan'];
    $koneksi->query("DELETE FROM hotel where idPesanan = '$idPesanan'");

    header("location:hotel.php");
}

if (isset($_POST['edit'])){
    $idPesanan = $_POST['idPesanan'];
    $nmPemesan = $_POST['nmPemesan'];
    $noTelp = $_POST['noTelp'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $koneksi->query("UPDATE hotel SET idPesanan='$idPesanan', nmPemesan='$nmPemesan',noTelp='$noTelp', jk='$jk', alamat='$alamat'");
    
    header("location:hotel.php");
}