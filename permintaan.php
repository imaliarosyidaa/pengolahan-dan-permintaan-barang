<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include 'fragments/navbar.php';
    ?>
    <div class="container shadow-sm mt-5 ms-5 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Pembayaran Listrik</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped" style="width: 65rem;">
        <thead>
            <th styles="width:10%">No</th>
            <th styles="width:20%"> no.pb</th>
            <th styles="width:20%"> tanggal </th>
            <th styles="width:10%"> peminta </th>
            <th styles="width:10%"> charge </th>
            <th styles="width:10%"> keterangan </th>
            <th styles="width:20%"> kode barang </th>
            <th styles="width:20%"> Deskripsi Barang </th>
            <th styles="width:10%"> jumlah </th>
            <th styles="width:10%"> satuan </th>
            <th styles="width:10%"> aktual keluar </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require 'config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->query("SELECT * FROM tb_pb");
                    $row = $stmt -> fetch();

                    $stmt = $pdo->prepare("SELECT * FROM tb_detail_pb WHERE id_pb = ?");
                    $stmt -> execute([$row['no.pb']]);

                    $i = 1;
                    while ($row2 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row["no.pb"]."</td>
                        <td>".$row["tanggal"]."</td>
                        <td>".$row["peminta"]."</td>
                        <td>".$row["charge"]."</td>
                        <td>".$row["keterangan"]."</td>
                        <td>".$row2["kode_barang"]."</td>
                        <td>".$row2["Deskripsi_Barang"]."</td>
                        <td>".$row2["jumlah"]."</td>
                        <td>".$row2["satuan"]."</td>
                        <td>".$row2["aktual_keluar"]."</td>
                    </tr>
                    ";$i++;}
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>