<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add buku</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                        <a class="nav-link active" href="#">Tambah buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="baca_buku.php">View buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="book-container">
        <div class="alert-box">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Berhasil Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Gagal Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>

        <main class="container border border-primary" style="width: 400px; margin-top: 20px;">
            <h1 style="text-align: center; margin-bottom: 20px;">Tambah buku</h1>

            <div>
                <form class="container" enctype="multipart/form-data" action="menulis_buku.php" method="post">
                    <div class="mb-3">
                        <label for="kodeBuku" class="form-label">Kode buku</label>
                        <input type="text" class="form-control" name="kodeBuku" id="kodeBuku" placeholder="Kode buku">
                    </div>
                    <div class="mb-3">
                        <label for="judulBuku" class="form-label">Judul buku</label>
                        <input type="text" class="form-control" name="judulBuku" id="judulBuku" placeholder="Judul buku">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang">
                    </div>
                    <div class="mb-3">
                        <label for="tahunTerbit" class="form-label">Tahun terbit</label>
                        <input type="text" class="form-control" name="tahunTerbit" id="tahunTerbit" placeholder="Tahun terbit">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahHalaman" class="form-label">Jumlah halaman</label>
                        <input type="text" class="form-control" name="jumlahHalaman" id="jumlahHalaman" placeholder="Jumlah halaman">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit">
                    </div>
                    <div class="mb-3">
                        <label for="kategoriBuku" class="form-label">Kategori buku</label>
                        <input type="text" class="form-control" name="kategoriBuku" id="kategoriBuku" placeholder="Kategori buku">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar buku</label>
                        <input type="file" name="gambar" accept="image/jpeg, image/png">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 50px;">Simpan</button>
                </form>
            </div>
        </main>


        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>