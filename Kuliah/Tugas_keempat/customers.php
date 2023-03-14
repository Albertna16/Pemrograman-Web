<?php
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include('connection.php');

// $conn = mysqli_connect("localhost", "root", "", "classicmodels")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="container-nav">
            <h2 style="color: white;">Sistem Informasi</h2>
            <div class="nav-menu">
                <a href="index.php">product</a>
                <a href="customers.php">Customers</a>
            </div>
        </div>
    </nav>


    <main>
        <h1 style="text-align: center; margin-bottom: 20px">Data Customers</h1>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">customerNumber</th>
                    <th scope="col">customerName</th>
                    <th scope="col">contactLastName</th>
                    <th scope="col">contactFirstName</th>
                    <th scope="col">phone</th>
                    <th scope="col">addressLine1</th>
                    <th scope="col">addressLine2</th>
                    <th scope="col">city</th>
                    <th scope="col">state</th>
                    <th scope="col">postalCode</th>
                    <th scope="col">salesRepEmployeeNumber</th>
                    <th scope="col">creditLimit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //proses menampilkan data dari database:
                //siapkan query SQL
                $query = "SELECT * FROM customers";
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $data['customerNumber'];  ?></td>
                        <td><?php echo $data['customerName'];  ?></td>
                        <td><?php echo $data['contactLastName'];  ?></td>
                        <td><?php echo $data['contactFirstName'];  ?></td>
                        <td><?php echo $data['phone'];  ?></td>
                        <td><?php echo $data['addressLine1'];  ?></td>
                        <td><?php echo $data['addressLine2'];  ?></td>
                        <td><?php echo $data['city'];  ?></td>
                        <td><?php echo $data['state'];  ?></td>
                        <td><?php echo $data['postalCode'];  ?></td>
                        <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                        <td><?php echo $data['creditLimit'];  ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>