<?php
//menyertakan file koneksi.php
require 'config/koneksi.php';

$no_sjb = $_POST["no_sjb"];
$tanggal = $_POST["tanggal"];
$dari = $_POST["dari"];
$tujuan = $_POST["tujuan"];
$dibawa_oleh = $_POST["dibawa_oleh"];
$keterangan = $_POST["keterangan"];
$Deskripsi_Barang = $_POST["Deskripsi_Barang"];
$jumlah = $_POST["jumlah"];
$satuan = $_POST["satuan"];

$sql = "INSERT INTO tb_sjb (id, no_sjb, tanggal, dari,tujuan,dibawa_oleh,keterangan)
VALUES ('','$no_sjb', '$tanggal', '$dari','$tujuan','$dibawa_oleh','$keterangan')";

$sql = "INSERT INTO tb_detail_sjb (id, no_sjb, tanggal, dari,tujuan,dibawa_oleh,keterangan)
VALUES ('','', '$Deskripsi_Barang', '$jumlah','$tujuan','$dibawa_oleh','$keterangan')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
    header("Location: dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

