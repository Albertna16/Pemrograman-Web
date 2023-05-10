<?php
require('ageFunction.php');

$Biodata = (array(
    array(
        'nama' => 'Muhammad Albert Nur Agathon',
        'tempatLahir' => 'Mojokerto',
        'tanggalLahir' => '16 Januari 2003',
        'umur' => myAge(),
        'jenisKelamin' => 'Laki-laki',
        'agama' => 'Islam',
        'hobby' => 'Bermain Gitar',
        'pendidikan' => 'Sarjana'
    ),
)
);

$Keahlian = (array(
    array('icon' => 'bx bx-mobile', 'keahlian' => 'Mobile Developer', 'detailKeahlian' => 'Dalam tahap belajar untuk pembuatan aplikasi mobile dengan menggunakan Framework Flutter'),
    array('icon' => 'bx bx-notepad', 'keahlian' => 'My Portofolio', 'detailKeahlian' => 'Portofolioku terdapat di akun github saya dengan nama Albertna16 di dalam repository Pemrograman-Web'),
    array('icon' => 'bx bxl-flutter', 'keahlian' => 'Flutter Developer', 'detailKeahlian' => 'Telah membuat beberapa tampilan aplikasi dengan UI/UX yang bervariasi dengan menggunakan Framework Flutter'),
)
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style1.css">

    <style type="text/css">
        @font-face {
            font-family: "Itim";
            src: url('font/Itim-Regular.ttf');
        }
    </style>
    <!-- icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <nav>
        <div class="container-nav">
            <!-- <div class="judul">
                <h6>My Website</h6>
            </div> -->
            <div class="logo">
                <img src="image/logo.png" alt="logo" style="height: 30px;"/>
            </div>
            <div class="menu">
                <a href="#Home">Home</a>
                <a href="#About_me">About me</a>
                <a href="#What_can_i_do">What can i do</a>
                <a href="#My_addres">My addres</a>
            </div>
        </div>
    </nav>

    <div class="Kotak-1" id="Home">
        <div class="container-1">
            <div class="box-1-1">
                <h2 style="font-size: 23px; margin-bottom: 15px;">Mobile Developer and Flutter Developer</h2>
                <h1 style="font-size: 60px; margin-bottom: 15px;">Muhammad Albert Nur Agathon</h1>
                <p style="font-size: 17px; ">Saya merupakan mahasiswa Semester 4 Program Studi Informatika.
                    Saya merupakan seorang individu yang teliti, pekerja keras, dan optimis dalam mempelajari hal baru.
                    Memiliki pengetahuan tentang Mobile Developer dan mampu bekerja sama dengan orang banyak dan
                    kolaborasi
                    proyek dengan berbagai tim dari latar belakang yang berbeda.</p>
            </div>
            <div class="box-1-2">
                <img src="image/main_image.png" alt="">
            </div>
        </div>
    </div>

    <div class="Kotak-2" style="background-color: #575E6D;" id="About_me">
        <div class="container-2">
            <div class="box-2-1">
                <img src="image/albert.jpg" alt="" style="height: 450px; border-radius: 30px;">
            </div>
            <div class="box-2-2">
                <h3 style="font-size: 30px; margin-bottom: 15px;">Profesional Image</h3>
                <h1 style="font-size: 70px; margin-bottom: 15px;">There Is All About Me</h1>
                <div class="box-table">
                    <table>
                        <?php foreach ($Biodata as $key) : ?>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>: <?php echo $key['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Tempat Lahir</b></td>
                                <td>: <?php echo $key['tempatLahir']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td>: <?php echo $key['tanggalLahir']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Umur</b></td>
                                <td>: <?php echo $key['umur']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>: <?php echo $key['jenisKelamin']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Agama</b></td>
                                <td>: <?php echo $key['agama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Hobby</b></td>
                                <td>: <?php echo $key['hobby']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Pendidikan</b></td>
                                <td>: <?php echo $key['pendidikan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="Kotak-3" style="background-color: #5E7D99;" id="What_can_i_do">
        <div class="container-3">
            <h1 style="text-align: center; padding-bottom: 50px; font-size: 64px;">What Can I Do</h1>
            <div class="box">
                <?php foreach ($Keahlian as $key) : ?>
                    <div class="card">
                        <i class='<?php echo $key['icon']; ?>' style="padding-bottom: 30px;"></i>
                        <h2 style="padding-bottom: 30px;"><?php echo $key['keahlian']; ?></h2>
                        <p><?php echo $key['detailKeahlian']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="Kotak-4" style="background-color: #575E6D;" id="My_addres">
        <div class="container-4">
            <div class="box-4-1">
                <img src="image/maps.png" alt="" style="width: 450px;">
            </div>

            <div class="box-4-2">
                <h1 style="font-size: 64px; text-align: center; margin-bottom: 25px;">My Address</h1>
                <h3 style="font-size: 30px; text-align: justify;">Dusun Mlirip RT 05 RW 10 No.23, Desa Mlirip, Kec. Jetis, Kabupaten Mojokerto, Jawa Timur 61352</h3>
                <div class="button">
                    <a href="https://goo.gl/maps/GMJQTCgvQdzxpiLK7" target="_blank" style="font-size: 25px;">Go To Maps</a>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>