<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Jalan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php 
        include 'fragments/navbar.php';
    ?>
    <!--Edit Data Pelanggan-->
                <?php
                //menyertakan file koneksi.php
                require 'config/koneksi.php';

                try {
                    // Retrieve data from database and display in form
                    $stmt = $pdo->prepare("SELECT * FROM tb_sjb WHERE id=?");
                    $stmt->execute([$_GET["id"]]);
                    $row = $stmt->fetch();

                    // Check if row exists
                    if(!$row){
                        echo "<p>Data tidak ditemukan</p>";
                    }
                    else{
                        ?>
                        <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 40rem; height: 35rem;">
                        <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Edit Pelanggan</div>
                            <form class="row g-3 ps-3 pe-2 pb-5" action="edit_pelanggan_action.php" method="POST">
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">No. SJB</label>
                                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $row["no_sjb"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Tanggal</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["tanggal"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Dari</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row["dari"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $row["tujuan"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputNama" class="form-label">Dibawa Oleh</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row["dibawa_oleh"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" value="<?php echo $row["keterangan"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Deskripsi Barang</label>
                                    <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" value="<?php echo $row2["Deskripsi_Barang"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" value="<?php echo $row2["jumlah"]; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Satuan</label>
                                    <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" value="<?php echo $row2["satuan"]; ?>" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                            
                        <?php
                    }
                } catch (PDOException $e) {
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
                ?>
</body>
</html>
