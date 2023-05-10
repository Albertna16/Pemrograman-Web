<?php
include 'connections.php';

$status = '';
$result = '';

// Melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_driver'])) {
    // Mendapatkan nilai dari parameter id_driver
    $id_driver = mysqli_real_escape_string(connection(), $_GET['id_driver']);

    // Membuat query SQL
    $query = "DELETE FROM driver WHERE id_driver = '$id_driver'";

    // Menjalankan query
    if (mysqli_query(connection(), $query)) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    // Mengarahkan pengguna kembali ke halaman driver.php
    header("Location: driver.php?status=$status");
    exit();
}
?>
