<?php
include 'connections.php';

$status = '';
$result = '';

// Melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_trans_upn'])) {
    // Mendapatkan nilai dari parameter id_trans_upn
    $id_trans_upn = mysqli_real_escape_string(connection(), $_GET['id_trans_upn']);

    // Membuat query SQL
    $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

    // Menjalankan query
    if (mysqli_query(connection(), $query)) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    // Mengarahkan pengguna kembali ke halaman transupn.php
    header("Location: transupn.php?status=$status");
    exit();
}
?>
