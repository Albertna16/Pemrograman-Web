<?php
include('connection.php');
$i = 1;
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 30px;">Sistem Informasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight: 600;" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">Customers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Insert Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="insert_data_product.php">Product</a></li>
                            <li><a class="dropdown-item" href="insert_data_customers.php">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <h1 style="text-align: center; margin-bottom: 20px;">Data Product</h1>

        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">productCode</th>
                    <th scope="col">productName</th>
                    <th scope="col">productLine</th>
                    <th scope="col">productScale</th>
                    <th scope="col">productVendor</th>
                    <th scope="col">productDescription</th>
                    <th scope="col">quantitylnStock</th>
                    <th scope="col">buyPrice</th>
                    <th scope="col">MSRP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //proses menampilkan data dari database:
                //siapkan query SQL
                $query = "SELECT * FROM products";
                $result = mysqli_query(connection(), $query);
                ?>

                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <tr class="dataProduct">
                        <th><?php echo $i; ?></th>
                        <th><?php echo $data['productCode'];  ?></th>
                        <td><?php echo $data['productName'];  ?></td>
                        <td><?php echo $data['productLine'];  ?></td>
                        <td><?php echo $data['productScale'];  ?></td>
                        <td><?php echo $data['productVendor'];  ?></td>
                        <td><?php echo $data['productDescription'];  ?></td>
                        <td><?php echo $data['quantityInStock'];  ?></td>
                        <td><?php echo $data['buyPrice'];  ?></td>
                        <td><?php echo $data['MSRP'];  ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>