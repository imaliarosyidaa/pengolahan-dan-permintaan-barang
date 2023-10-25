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
    <title>Document</title>
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
    <!--Add Data Penggunaan-->
    <div class="d-flex flex-direction-nav">
    <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 45rem; height: 55rem;">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Add Tagihan</div>
        <form class="row g-3 ps-3 pe-2 pb-5" action="add_jalanbarang_action.php" method="POST">
        <div class="col-12">
            <label for="inputAddress" class="form-label">No. SJB</label>
            <input type="text" class="form-control" id="no_sjb" name="no_sjb" required>
        </div>
        <div class="col-12">
            <label for="inputEmail4" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Dari</label>
            <input type="text" class="form-control" id="dari" name="dari" required>
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        </div>
        <div class="col-12">
            <label for="inputNama" class="form-label">Dibawa Oleh</label>
            <input type="text" class="form-control" id="dibawa_oleh" name="dibawa_oleh" required>
        </div>
        <div class="col-12">
            <label for="inputCity" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
        </div>
        <div class="col-12">
            <label for="inputCity" class="form-label">Deskripsi Barang</label>
            <input type="text" class="form-control" id="Deskripsi_Barang" name="Deskripsi_Barang" required>
        </div>
        <div class="col-12">
            <label for="inputCity" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="col-12">
            <label for="inputCity" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" required>
        </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!--Tagihan-->
    <div class="container shadow-sm me-5 mt-5 ms-3 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Daftar Jalan Barang</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
                <th>No</th>
                <th>No. SJB</th>
                <th>Tanggal</th>
                <th>Dari</th>
                <th>Tujuan</th>
                <th>Dibawa Oleh</th>
                <th>Keterangan</th>
                <th>Deskripsi Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require 'config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->query("SELECT * FROM tb_sjb");
                    $row = $stmt->fetch();

                    $stmt = $pdo->prepare("SELECT * FROM tb_detail_sjb WHERE id_sjb = ?");
                    $stmt -> execute([$row['no_sjb']]);

                    $i = 1;
                    while ($row2 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row["no_sjb"]."</td>
                        <td>".$row["tanggal"]."</td>
                        <td>".$row["dari"]."</td>
                        <td>".$row["tujuan"]."</td>
                        <td>".$row["dibawa_oleh"]."</td>
                        <td>".$row["keterangan"]."</td>
                        <td>".$row2["Deskripsi_Barang"]."</td>
                        <td>".$row2["jumlah"]."</td>
                        <td>".$row2["satuan"]."</td>
                        <td>
                        <a  id='hapus' href='hapus.php?id_tagihan=".$row["id"]."' class='btn btn-primary mx-2'>Hapus</a>
                        <a  id='update' href='update_jalanbarang.php?id=".$row["id"]."' class='btn btn-primary mx-2'>Update</a>
                        </td>
                    </tr>
                    "; $i++;}
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
    </div>
</body>
</html>