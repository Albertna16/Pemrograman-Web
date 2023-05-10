<<<<<<< HEAD
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
                    <a class="nav-link" href="index.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight: 600;" href="customers.php">Customers</a>
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
    <h1 style="text-align: center; margin-bottom: 20px;">Data Customers</h1>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Number</th>
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
                        <td><?php echo $i; ?></td>
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
                    <?php $i++ ?>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

=======
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
                    <a class="nav-link" href="index.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight: 600;" href="customers.php">Customers</a>
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
    <h1 style="text-align: center; margin-bottom: 20px;">Data Customers</h1>
        <table class="table table-success table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Number</th>
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
                        <td><?php echo $i; ?></td>
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
                    <?php $i++ ?>
                <?php endwhile ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

>>>>>>> 98c425f07f850013623e1f6695443ef9ef9b7a0a
</html>