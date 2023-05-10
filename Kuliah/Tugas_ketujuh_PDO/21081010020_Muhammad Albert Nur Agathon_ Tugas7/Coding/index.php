<?php
require_once('product.php');
require_once('cdMusic.php');
require_once('cdCabinet.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studi Kasus OOP</title>
</head>

<body>
    <?php
    // Data Product
    $product1 = new Product();
    $product1->setName("Album lagu John Coltrane - A Love Supreme");
    $product1->setPrice(40000000);
    $product1->setDiscount(6);

    $product2 = new Product();
    $product2->setName("Album lagu Pink Floyd - The Wall");
    $product2->setPrice(35000000);
    $product2->setDiscount(4);

    $product3 = new Product();
    $product3->setName("Kabinet Kayu Jati");
    $product3->setPrice(4999000);
    $product3->setDiscount(10);

    $product4 = new Product();
    $product4->setName("Kabinet Baja Ringan");
    $product4->setPrice(1450000);
    $product4->setDiscount(10);


    // Data CD Music
    $music1 = new CDMusic();
    $music1->setArtist("Gregory Porter");
    $music1->setName($product1->getName());
    $music1->setGenre("Jazz");
    $music1->setPrice($product1->getPrice());
    $music1->setDiscount($product1->getDiscount());

    $music2 = new CDMusic();
    $music2->setArtist("Post Malone");
    $music2->setName($product2->getName());
    $music2->setGenre("Rock");
    $music2->setPrice($product2->getPrice());
    $music2->setDiscount($product2->getDiscount());


    // Data CD Cabinet
    $cabinet1 = new CDCabinet();
    $cabinet1->setName($product3->getName());
    $cabinet1->setModel("Kayu");
    $cabinet1->setCapacity("10 kotak");
    $cabinet1->setPrice($product3->getPrice());
    $cabinet1->setDiscount($product3->getDiscount());

    $cabinet2 = new CDCabinet();
    $cabinet2->setName($product4->getName());
    $cabinet2->setModel("Baja");
    $cabinet2->setCapacity("15 kotak");
    $cabinet2->setPrice($product4->getPrice());
    $cabinet2->setDiscount($product4->getDiscount());

    ?>
    <table class="Product">
        <tr>
            <td><b><?php echo "PRODUCT" ?></b></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama Produk" ?></td>
            <td>: <?php echo $product1->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga Produk" ?></td>
            <td>: <?php echo "Rp. " . $product1->getPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon Produk" ?></td>
            <td>: <?php echo $product1->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama Produk" ?></td>
            <td>: <?php echo $product2->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga Produk" ?></td>
            <td>: <?php echo "Rp. " . $product2->getPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon Produk" ?></td>
            <td>: <?php echo $product2->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama Produk" ?></td>
            <td>: <?php echo $product3->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga Produk" ?></td>
            <td>: <?php echo "Rp. " . $product3->getPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon Produk" ?></td>
            <td>: <?php echo $product3->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama Produk" ?></td>
            <td>: <?php echo $product4->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga Produk" ?></td>
            <td>: <?php echo "Rp. " . $product4->getPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon Produk" ?></td>
            <td>: <?php echo $product4->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "<br><br><br>" ?></td>
        </tr>
    </table>

    <table class="cdMusic">
        <tr>
            <td><b><?php echo "CD Music" ?></b></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama artis" ?></td>
            <td>: <?php echo $music1->getArtist();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Produk yang dibeli" ?></td>
            <td>: <?php echo $music1->getName(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Genre musik" ?></td>
            <td>: <?php echo $music1->getGenre(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk + pajak" ?></td>
            <td>: <?php echo "Rp. " . $music1->musicPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon produk" ?></td>
            <td>: <?php echo $music1->musicDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk setelah diskon" ?></td>
            <td>: <?php echo "Rp. " . $music1->resultPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama artis" ?></td>
            <td>: <?php echo $music2->getArtist();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Produk yang dibeli" ?></td>
            <td>: <?php echo $music2->getName(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Genre musik" ?></td>
            <td>: <?php echo $music2->getGenre(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk + pajak" ?></td>
            <td>: <?php echo "Rp. " . $music2->musicPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon produk" ?></td>
            <td>: <?php echo $music2->musicDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk setelah diskon" ?></td>
            <td>: <?php echo "Rp. " . $music2->resultPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "<br><br><br>" ?></td>
        </tr>
    </table>

    <table class="cdCabinet">
        <tr>
            <td><b><?php echo "CD Cabinet" ?></b></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama produk" ?></td>
            <td>: <?php echo $cabinet1->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Model produk" ?></td>
            <td>: <?php echo $cabinet1->getModel();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Kapasitas produk" ?></td>
            <td>: <?php echo $cabinet1->getCapacity(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk + pajak" ?></td>
            <td>: <?php echo "Rp " . $cabinet1->cabinetPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon produk" ?></td>
            <td>: <?php echo $cabinet1->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk setelah diskon" ?></td>
            <td>: <?php echo "Rp. " . $cabinet1->resultPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "<br>" ?></td>
        </tr>
        <tr>
            <td><?php echo "Nama produk" ?></td>
            <td>: <?php echo $cabinet2->getName();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Model produk" ?></td>
            <td>: <?php echo $cabinet2->getModel();  ?></td>
        </tr>
        <tr>
            <td><?php echo "Kapasitas produk" ?></td>
            <td>: <?php echo $cabinet2->getCapacity(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk + pajak" ?></td>
            <td>: <?php echo "Rp " . $cabinet2->cabinetPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "Diskon produk" ?></td>
            <td>: <?php echo $cabinet2->getDiscount() . " %"; ?></td>
        </tr>
        <tr>
            <td><?php echo "Harga produk setelah diskon" ?></td>
            <td>: <?php echo "Rp. " . $cabinet2->resultPrice(); ?></td>
        </tr>
        <tr>
            <td><?php echo "<br><br><br>" ?></td>
        </tr>
    </table>
</body>

</html>