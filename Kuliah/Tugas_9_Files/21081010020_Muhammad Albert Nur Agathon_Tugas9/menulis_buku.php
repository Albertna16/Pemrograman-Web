<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = "buku.txt";
    $targetDir = "upload/";
    $namaGambar = '';

    // Memeriksa apakah ada file gambar yang diupload
    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $gambar = $_FILES["gambar"];
        $fileExtension = strtolower(pathinfo($gambar["name"], PATHINFO_EXTENSION));

        // Menghasilkan nama unik untuk file gambar
        $namaGambar = uniqid() . '.' . $fileExtension;
        $targetPath = $targetDir . $namaGambar;

        // Memeriksa ekstensi file gambar yang diupload
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($fileExtension, $allowedExtensions)) {
            // Pindahkan file gambar ke folder upload/
            if (move_uploaded_file($gambar["tmp_name"], $targetPath)) {
                echo "File gambar berhasil diupload.";

                // Mengambil nilai dari elemen-elemen formulir yang dikirim melalui metode POST
                $kodeBuku = $_POST["kodeBuku"];
                $judulBuku = $_POST["judulBuku"];
                $pengarang = $_POST["pengarang"];
                $tahunTerbit = $_POST["tahunTerbit"];
                $jumlahHalaman = $_POST["jumlahHalaman"];
                $penerbit = $_POST["penerbit"];
                $kategoriBuku = $_POST["kategoriBuku"];

                $buku =  $kodeBuku . "-" . $judulBuku . "-" . $pengarang . "-" . $tahunTerbit . "-" . $jumlahHalaman . "-" . $penerbit . "-" . $kategoriBuku . "-" . $namaGambar . "\n";

                // Menyimpan informasi buku ke dalam file buku.txt
                if (file_put_contents($file, $buku, FILE_APPEND) > 0) {
                    $status = "ok";
                } else {
                    $status = "err";
                }
            } else {
                echo "Terjadi kesalahan saat mengupload file gambar.";
            }
        } else {
            echo "Ekstensi file gambar tidak valid. Harap upload file dengan ekstensi JPG, JPEG, atau PNG.";
        }
    } else {
        echo "Tidak ada file gambar yang diupload.";
    }

    header('Location: insert_buku.php?status=' . $status);
}
