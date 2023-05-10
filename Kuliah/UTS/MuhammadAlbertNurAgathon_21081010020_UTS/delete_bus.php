<?php
include 'connections.php';

$status = '';
$result = '';

// Melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_bus'])) {
    // Mendapatkan nilai dari parameter id_bus
    $id_bus = mysqli_real_escape_string(connection(), $_GET['id_bus']);

    // Membuat query SQL
    $query = "DELETE FROM bus WHERE id_bus = '$id_bus'";

    // Menjalankan query
    if (mysqli_query(connection(), $query)) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    // Mengarahkan pengguna kembali ke halaman bus.php
    header("Location: bus.php?status=$status");
    exit();
}
?>
