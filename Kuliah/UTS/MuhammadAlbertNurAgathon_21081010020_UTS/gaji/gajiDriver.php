<?php
include('../connections.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransUPN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 30px;">TransUPN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" aria-current="page" style="font-weight: 600;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Display
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../bus.php">Bus</a></li>
                            <li><a class="dropdown-item" href="../driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="../kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="../transupn.php">Trans_UPN</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gaji
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item nav-link active" href="../gaji/gajiDriver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="../gaji/gajiKondektur.php">Kondektur</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Insert Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../insert_data_bus.php">Bus</a></li>
                            <li><a class="dropdown-item" href="../insert_data_driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="../insert_data_kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="../insert_data_transupn.php">Transupn</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            <div class="mb-3 d-flex" style="width: 300px;">
                <select class="form-select me-2" name="bulan" id="bulan">
                    <option value="0">All</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        $monthName = date('F', mktime(0, 0, 0, $i, 1));
                        $selected = isset($_POST["bulan"]) && $_POST["bulan"] == $i ? "selected" : "";
                        echo "<option value='$i' $selected>$monthName</option>";
                    }
                    ?>
                </select>
                <button type="submit" id="submitFilter" name="submitFilter" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>

    <main class="container" style="width: 800px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Data Driver</h1>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID Driver</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No SIM</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jumlah KM</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // filter gaji driver
                function filterGajiDriver($data)
                {
                    if ($data["bulan"] == 0) {
                        return "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.tanggal, SUM(t.jumlah_km) AS jumlah_km, 
            SUM(IF(MONTH(t.tanggal) = MONTH(NOW()), t.jumlah_km, 0) * 3000) AS gaji
            FROM driver b
            JOIN trans_upn t ON b.id_driver = t.id_driver
            GROUP BY b.id_driver;";
                    } else {
                        $yearMonth = date('Y-m', strtotime('2023-' . sprintf('%02d', $data["bulan"]) . '-01'));
                        return "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.tanggal, SUM(t.jumlah_km) AS jumlah_km, 
            SUM(IF(t.tanggal LIKE '%{$yearMonth}%', t.jumlah_km, 0) * 3000) AS gaji
            FROM driver b
            JOIN trans_upn t ON b.id_driver = t.id_driver
            WHERE t.tanggal LIKE '%{$yearMonth}%'
            GROUP BY b.id_driver, t.tanggal;";
                    }
                }

                //proses menampilkan data dari database:
                //siapkan query SQL
                $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.tanggal, SUM(t.jumlah_km) AS jumlah_km, 
          SUM(IF(MONTH(t.tanggal) = MONTH(NOW()), t.jumlah_km, 0) * 3000) AS gaji
          FROM driver b
          JOIN trans_upn t ON b.id_driver = t.id_driver
          GROUP BY b.id_driver;";

                if (isset($_POST["submitFilter"])) {
                    $query = filterGajiDriver($_POST);
                }

                $result = mysqli_query(connection(), $query);

                ?>



                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr class="text-center">
                        <td><?php echo $data['id_driver'];  ?></td>
                        <td><?php echo $data['nama'];  ?></td>
                        <td><?php echo $data['no_sim'];  ?></td>
                        <td><?php echo $data['alamat'];  ?></td>
                        <td><?php echo $data['jumlah_km'] ?></td>
                        <td><?php echo $data['gaji']  ?></td>
                        <td><?php echo $data['tanggal']  ?></td>

                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>