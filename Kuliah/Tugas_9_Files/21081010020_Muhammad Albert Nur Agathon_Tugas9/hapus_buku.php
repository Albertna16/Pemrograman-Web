<?php
$file = 'buku.txt';
$read = file($file);

if (isset($_GET['kodeBuku'])) {
    $kodeBuku = $_GET['kodeBuku']; // Nomor baris yang ingin dihapus
    $index = 0;
    $status = "err"; // Inisialisasi status dengan "err"

    foreach ($read as $barisIndex => $buku) {
        $data = explode("-", $buku);
        if ($data[0] == $kodeBuku) {
            // Hapus gambar terkait
            if (isset($data[7])) {
                $gambar = "upload/" . $data[7];
                if (file_exists($gambar)) {
                    unlink($gambar);
                }
            }
            
            // Hapus baris dari array
            unset($read[$barisIndex]);
            $status = "ok"; // Set status menjadi "ok" jika ditemukan dan dihapus
            break; // Keluar dari loop setelah baris ditemukan dan dihapus
        }
    }

    // Tulis ulang data ke file
    file_put_contents($file, implode("", $read));
    header('Location: baca_buku.php?status=' . $status);
}
