<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>

    <!-- CSS-->
    <link rel="stylesheet" href="app.css">

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
                        <a class="nav-link" href="insert_buku.php">Tambah buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">View buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="book-container">
        <div class="alert-box-delete">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Berhasil Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Gagal Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }

            if (@$_GET["statusUpdate"] !== NULL) {
                $status = $_GET["statusUpdate"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Berhasil Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Gagal Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>

        <main class="container" style="width: 1500px;">
            <h1 style="text-align: center; margin-bottom: 20px;">Data Buku</h1>
            <table class="table table-success table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">action</th>
                        <th scope="col">Kode buku</th>
                        <th scope="col">Judul buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun terbit</th>
                        <th scope="col">Jumlah halaman</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Kategori buku</th>
                        <th scope="col">Gambar buku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $file_names = "buku.txt";
                    $read = file($file_names); // arr

                    foreach ($read as $buku) {
                        $data_buku = explode("-", $buku); // arr
                        echo "<tr>";
                        echo "<td class='aksi' style='display: flex; flex-direction: column; justify-content: center; padding: 10px'>
                            <a class='btn btn-warning btn-sm' style='margin-bottom: 10px;' href='update_buku.php?kodeBuku=" . $data_buku[0] . "'>Update</a>
                            <a class='btn btn-danger btn-sm' href='hapus_buku.php?kodeBuku=" . $data_buku[0] . "' onclick='return confirm(\"Apakah anda yakin?\");'>Delete</a>
                            </td>";
                        echo "<td>" . $data_buku[0] . "</td>";
                        echo "<td>" . $data_buku[1] . "</td>";
                        echo "<td>" . $data_buku[2] . "</td>";
                        echo "<td>" . $data_buku[3] . "</td>";
                        echo "<td>" . $data_buku[4] . "</td>";
                        echo "<td>" . $data_buku[5] . "</td>";
                        echo "<td>" . $data_buku[6] . "</td>";
                        echo "<td><img src='upload/$data_buku[7]' style='width: 100px;'></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

        <!-- Fontawsome -->
        <script src="https://kit.fontawesome.com/ee9e0f07f2.js" crossorigin="anonymous"></script>
</body>

</html>