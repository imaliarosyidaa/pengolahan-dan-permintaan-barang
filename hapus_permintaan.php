<?php
try {
    $id_item = $_GET['id'];

    $pdo = new PDO($dsn,$db_username,$db_password,$opt);
    $stmt = $pdo->prepare("DELETE FROM tb_pb WHERE id = ?");
    $stmt->execute([$id]);
    echo "
    <script>
    alert('Data berhasil dihapus');
    document.location.href='dashboard.php'
    </script>";
    exit;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>