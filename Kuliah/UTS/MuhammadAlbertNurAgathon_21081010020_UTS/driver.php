<?php
include('connections.php');
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
                        <a class="nav-link" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link active" aria-current="page" style="font-weight: 600;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Display
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bus.php">Bus</a></li>
                            <li><a class="dropdown-item nav-link active" href="driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="transupn.php">Trans_UPN</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gaji
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../UTS/gaji/gajiDriver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="../UTS/gaji/gajiKondektur.php">Kondektur</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Insert Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="insert_data_bus.php">Bus</a></li>
                            <li><a class="dropdown-item" href="insert_data_driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="insert_data_kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="insert_data_transupn.php">Transupn</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        if (@$_GET["status"] !== NULL) {
            $status = $_GET["status"];
            if ($status == "ok") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            } elseif ($status == "err") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        }
        ?>

    <main class="container" style="width: 800px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Data Driver</h1>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">action</th>
                    <th scope="col">ID Driver</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No SIM</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //proses menampilkan data dari database:
                //siapkan query SQL
                $query = "SELECT * FROM driver";
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr class="text-center">
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-warning btn-sm" href="update_data_driver.php?id_driver=<?php echo $data["id_driver"]; ?> " style="margin-right: 5px;">Update</a>
                            <a class="btn btn-danger btn-sm" href="<?php echo "delete_driver.php?id_driver=" . $data['id_driver']; ?>">Delete</a>
                        </td>
                        <td><?php echo $data['id_driver'];  ?></td>
                        <td><?php echo $data['nama'];  ?></td>
                        <td><?php echo $data['no_sim'];  ?></td>
                        <td><?php echo $data['alamat'];  ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>