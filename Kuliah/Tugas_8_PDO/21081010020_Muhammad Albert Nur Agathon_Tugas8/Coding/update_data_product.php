<?php
require('connection.php');

$productCode = $_GET["productCode"];
//proses menampilkan data yang akan diubah:
//siapkan query SQL berdasarkan id
$query = "SELECT * FROM products WHERE productCode = '$productCode'";
//eksekusi query
$product = $connection->query($query);
$data = $product->fetch(PDO::FETCH_ASSOC);

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST["productCode"];
    $productName = $_POST["productName"];
    $productLine = $_POST["productLine"];
    $productScale = $_POST["productScale"];
    $productVendor = $_POST["productVendor"];
    $productDescription = $_POST["productDescription"];
    $quantityInStock = $_POST["quantityInStock"];
    $buyPrice = $_POST["buyPrice"];
    $MSRP = $_POST["MSRP"];

    //query with PDO
    $query = $connection->prepare("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES (:productCode, :productName, :productLine, :productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)");

    $query = $connection->prepare("UPDATE products
            SET productCode = :productCode,
                productName = :productName,
                productLine = :productLine,
                productScale = :productScale,
                productVendor = :productVendor,
                productDescription = :productDescription,
                quantityInStock = :quantityInStock,
                buyPrice = :buyPrice,
                MSRP = :MSRP
            WHERE productCode = :productCode");

    //binding data
    $query->bindParam(':productCode', $productCode);
    $query->bindParam(':productName', $productName);
    $query->bindParam(':productLine',  $productLine);
    $query->bindParam(':productScale',  $productScale);
    $query->bindParam(':productVendor', $productVendor);
    $query->bindParam(':productDescription', $productDescription);
    $query->bindParam(':quantityInStock', $quantityInStock);
    $query->bindParam(':buyPrice', $buyPrice);
    $query->bindParam(':MSRP', $MSRP);

    if ($query->execute()) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
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
            <a class="navbar-brand" href="#" style="font-size: 30px;">Sistem Informasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight: 600;" href="index.php">Product</a>
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

    <main class="container border border-primary" style="width: 400px; margin-top: 20px;">
        <h1 style="text-align: center; margin-bottom: 20px;">Update Data Product</h1>
        <div>
            <div class="container">
                <?php
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Update data product berhasil!!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';

                    echo '<a href="index.php" class="btn btn-outline-primary" style="margin-bottom: 20px;">Kembali</a>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Update data product gagal!!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

                    echo '<a href="index.php" class="btn btn-outline-primary" style="margin-bottom: 20px;">Kembali</a>';
                }
                ?>
            </div>

            <form class="container" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productCode" class="form-label">Product Code</label>
                    <input value="<?php echo $data["productCode"]; ?>" type="text" class="form-control" name="productCode" id="ProductCode" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input value="<?php echo $data["productName"]; ?>" type="text" class="form-control" name="productName" id="productName" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="productLine" class="form-label">Product Line</label>
                    <select class="form-select" name="productLine" id="productLine">
                        <option selected><?php echo $data["productLine"]; ?></option>
                        <option value="Classic Cars">Classic Cars</option>
                        <option value="Motorcycles">Motorcycles</option>
                        <option value="Planes">Planes</option>
                        <option value="Ships">Ships</option>
                        <option value="Trains">Trains</option>
                        <option value="Trucks and Buses">Trucks and Buses</option>
                        <option value="Vintage Cars">Vintage Cars</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productScale" class="form-label">Product Scale</label>
                    <input value="<?php echo $data["productScale"]; ?>" type="text" class="form-control" name="productScale" id="productScale" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="productVendor" class="form-label">Product Vendor</label>
                    <input value="<?php echo $data["productVendor"]; ?>" type="text" class="form-control" name="productVendor" id="productVendor" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <input value="<?php echo $data["productDescription"]; ?>" type="text" class="form-control" name="productDescription" id="productDescription" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="quantityInStock" class="form-label">Quantity in Stock</label>
                    <input value="<?php echo $data["quantityInStock"]; ?>" type="text" class="form-control" name="quantityInStock" id="quantityInStock" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="buyPrice" class="form-label">Buy Price</label>
                    <input value="<?php echo $data["buyPrice"]; ?>" type="text" class="form-control" name="buyPrice" id="buyPrice" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="MSRP" class="form-label">MSRP</label>
                    <input value="<?php echo $data["MSRP"]; ?>" type="text" class="form-control" name="MSRP" id="MSRP" placeholder="">
                </div>
                <button type="submit" name="submit" class="btn btn-warning" style="margin-bottom: 50px;">Update</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>