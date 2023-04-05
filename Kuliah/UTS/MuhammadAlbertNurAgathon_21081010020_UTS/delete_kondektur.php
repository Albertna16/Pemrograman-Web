<?php
include 'connections.php';

$status = '';
$result = '';

// Melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_kondektur'])) {
    // Mendapatkan nilai dari parameter id_kondektur
    $id_kondektur = mysqli_real_escape_string(connection(), $_GET['id_kondektur']);

    // Membuat query SQL
    $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur'";

    // Menjalankan query
    if (mysqli_query(connection(), $query)) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    // Mengarahkan pengguna kembali ke halaman kondektur.php
    header("Location: kondektur.php?status=$status");
    exit();
}
?>
