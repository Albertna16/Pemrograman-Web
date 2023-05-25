<?php
$fileName = 'buku.txt';
$read = file($fileName);

if (isset($_GET['kodeBuku'])) {
    $kodeBuku = $_GET['kodeBuku']; // Nomor baris yang ingin diupdate

    foreach ($read as $barisIndex => $buku) {
        $data_buku = explode("-", $buku);
        if (count($data_buku) < 8) {
            continue; // Lewatkan baris yang tidak sesuai format
        }
        if ($data_buku[0] == $kodeBuku) {
            $kodeBuku = $data_buku[0];
            $judulBuku = $data_buku[1];
            $pengarang = $data_buku[2];
            $tahunTerbit = $data_buku[3];
            $jumlahHalaman = $data_buku[4];
            $penerbit = $data_buku[5];
            $kategoriBuku = $data_buku[6];
            $namaGambar = $data_buku[7]; // Menambahkan variabel untuk menyimpan nama gambar
            break; // Keluar dari loop setelah baris ditemukan
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodeBuku = $_POST["kodeBuku"];
    $judulBuku = $_POST["judulBuku"];
    $pengarang = $_POST["pengarang"];
    $tahunTerbit = $_POST["tahunTerbit"];
    $jumlahHalaman = $_POST["jumlahHalaman"];
    $penerbit = $_POST["penerbit"];
    $kategoriBuku = $_POST["kategoriBuku"];
    $namaGambar = $_POST["namaGambar"]; 

    $fileData = [];

    foreach ($read as $barisIndex => $buku) {
        $data_buku = explode("-", $buku);
        if (count($data_buku) < 8) {
            $fileData[] = $buku; // Baris yang tidak sesuai format tetap ditambahkan ke fileData
            continue;
        }
        if ($data_buku[0] == $kodeBuku) {
            $data_buku[0] = $kodeBuku;
            $data_buku[1] = $judulBuku;
            $data_buku[2] = $pengarang;
            $data_buku[3] = $tahunTerbit;
            $data_buku[4] = $jumlahHalaman;
            $data_buku[5] = $penerbit;
            $data_buku[6] = $kategoriBuku;

            // Cek apakah ada file gambar yang diupload
            if ($_FILES['gambar']['name'] !== '') {
                // Upload gambar baru dan update nama gambar
                $namaFile = uploadFile($_FILES['gambar']);
                if ($namaFile) {
                    $data_buku[7] = $namaFile;
                }
            } else {
                // Jika tidak ada file gambar yang diupload, tetap gunakan nama gambar yang lama
                $data_buku[7] = $namaGambar;
            }

            $fileData[] = implode("-", $data_buku); // Gabungkan kembali array data buku
        } else {
            $fileData[] = $buku; // Baris buku yang tidak diubah tetap ditambahkan ke fileData
        }
    }

    file_put_contents($fileName, implode("", $fileData));
    $statusUpdate = "ok";

    if (!isset($statusUpdate)) {
        $statusUpdate = "err";
    }
    header('Location: baca_buku.php?statusUpdate=' . $statusUpdate);
}

function uploadFile($file)
{
    $targetDir = "upload/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Generate unique name for the file
    $fileName = uniqid() . '.' . $fileType;
    $targetFilePath = $targetDir . $fileName;

    // Upload file to the specified path
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $fileName;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="font-size: 30px;">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="insert_buku.php">Tambah buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="baca_buku.php">View buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container border border-primary" style="width: 400px; margin-top: 20px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Update Data Buku</h1>

        <div>
            <form class="container" enctype="multipart/form-data" action="update_buku.php" method="post">
                <div class=" mb-3">
                    <label for="kodeBuku" class="form-label">Kode Buku</label>
                    <input value="<?php echo $kodeBuku ?>" type="text" class="form-control" id="kodeBuku" name="kodeBuku" placeholder="Kode buku">
                </div>
                <div class="mb-3">
                    <label for="judulBuku" class="form-label">Judul Buku</label>
                    <input value="<?php echo $judulBuku ?>" type="text" class="form-control" id="judulBuku" name="judulBuku" placeholder="Judul buku">
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input value="<?php echo $pengarang ?>" type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang">
                </div>
                <div class="mb-3">
                    <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                    <input value="<?php echo $tahunTerbit ?>" type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder="Tahun terbit">
                </div>
                <div class="mb-3">
                    <label for="jumlahHalaman" class="form-label">Jumlah Halaman</label>
                    <input value="<?php echo $jumlahHalaman ?>" type="text" class="form-control" id="jumlahHalaman" name="jumlahHalaman" placeholder="Jumlah halaman">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input value="<?php echo $penerbit ?>" type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
                </div>
                <div class="mb-3">
                    <label for="kategoriBuku" class="form-label">Kategori</label>
                    <input value="<?php echo $kategoriBuku ?>" type="text" class="form-control" id="kategoriBuku" name="kategoriBuku" placeholder="Kategori">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <input type="hidden" name="namaGambar" value="<?php echo $namaGambar ?>">
                <?php if ($namaGambar) : ?>
                    <div class="mb-3">
                        <img src="upload/<?php echo $namaGambar ?>" alt="Gambar Buku" style="max-width: 200px;">
                    </div>
                <?php endif; ?>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 50px;">Update</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRAcO/HH1N/Zf4J0VopDBbcRBkmI5mIEoWXYCtK4E5" crossorigin="anonymous"></script>
</body>

</html>