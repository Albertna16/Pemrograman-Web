<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('connections.php');

$status = '';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query SQL
        $id_trans_upn = $_GET['id_trans_upn'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE trans_upn SET id_trans_upn='$id_trans_upn', id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header('Location: transupn.php?status=' . $status);
    exit();
}

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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Display
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bus.php">Bus</a></li>
                            <li><a class="dropdown-item" href="driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="transupn.php">Trans_UPN</a></li>
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

    <main class="container border border-primary" style="width: 400px; margin-top: 20px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Update Data Transupn</h1>
        <div>
            <form action="update_data_transupn.php" method="POST">
                <?php $kondektur = "SELECT id_kondektur FROM kondektur";
                $bus = "SELECT id_bus FROM bus";
                $driver = "SELECT id_driver FROM driver";

                $result_kondektur = mysqli_query(connection(), $kondektur);
                $result_bus = mysqli_query(connection(), $bus);
                $result_driver = mysqli_query(connection(), $driver); ?>


                <?php ($data_bus = mysqli_fetch_array($result_bus));
                ($data_kondektur = mysqli_fetch_array($result_kondektur));
                ($data_driver = mysqli_fetch_array($result_driver));
                ?>

                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <div class="mb-3">
                        <label for="id_trans_upn" class="form-label">ID Transupn</label>
                        <input type="text" class="form-control" name="id_trans_upn" id="id_trans_upn" placeholder="id_trans_upn" value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_kondektur" class="form-label">ID Kondektur</label>
                        <select class="form-select" name="id_kondektur" id="id_kondektur">
                            <option selected><?php echo $data['id_kondektur'];  ?></option>
                            <?php while ($data_kondektur = mysqli_fetch_array($result_kondektur)) : ?>
                                <option value="<?php echo $data["id_kondektur"]; ?>"><?php echo $data["id_kondektur"]; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_bus" class="form-label">ID Bus</label>
                        <select class="form-select" name="id_bus" id="id_bus">
                            <option selected><?php echo $data['id_bus'];  ?></option>
                            <?php while ($data_bus = mysqli_fetch_array($result_bus)) : ?>
                                <option value="<?php echo $data["id_bus"]; ?>"><?php echo $data["id_bus"]; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_driver" class="form-label">ID Driver</label>
                        <select class="form-select" name="id_driver" id="id_driver">
                            <option selected><?php echo $data['id_driver'];  ?></option>
                            <?php while ($data_driver = mysqli_fetch_array($result_driver)) : ?>
                                <option value="<?php echo $data["id_driver"]; ?>"><?php echo $data["id_driver"]; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_km" class="form-label">Jumlah KM</label>
                        <input type="text" class="form-control" name="jumlah_km" id="jumlah_km" placeholder="jumlah_km" value="<?php echo $data['jumlah_km'];  ?>" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal" value="<?php echo $data['tanggal'];  ?>" required="required">
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Save</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>