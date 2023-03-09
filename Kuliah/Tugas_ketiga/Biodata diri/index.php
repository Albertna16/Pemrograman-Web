<?php require ('ageFunction.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style1.css">

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
    <div class="Kotak-1">
        <h3 style="font-family: Itim;">Selamat datang di website kami</h3>
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

    <div class="Kotak-2" style="background-color: #575E6D;">
        <div class="container-2">
            <div class="box-2-1">
                <img src="../Biodata diri/image/albert.jpg" alt="" style="height: 450px; border-radius: 30px;">
            </div>
            <div class="box-2-2">
                <h3 style="font-size: 30px; margin-bottom: 15px;">Profesional Image</h3>
                <h1 style="font-size: 70px; margin-bottom: 15px;">There Is All About Me</h1>
                <div class="box-table">
                    <table>
                        <tr>
                            <td><b>Nama</b></td>
                            <td>: Muhammad Albert Nur Agathon</td>
                        </tr>
                        <tr>
                            <td><b>Tempat Lahir</b></td>
                            <td>: Mojokerto</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td>: 16 Januari 2003</td>
                        </tr>
                        <tr>
                            <td><b>Umur</b></td>
                            <td>: <?php myAge() ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>: Laki-laki</td>
                        </tr>
                        <tr>
                            <td><b>Agama</b></td>
                            <td>: Islam</td>
                        </tr>
                        <tr>
                            <td><b>Hobby</b></td>
                            <td>: Bermain gitar</td>
                        </tr>
                        <tr>
                            <td><b>Pendidikan</b></td>
                            <td>: S1</td>
                        </tr>
                    </table>
                </div>
                <!-- <div class="logo">
                    <i class='bx bxs-user' style="font-size: 80px;"></i>
                    <table border="1" cellpadding="10" cellspacing="5">
                        <tr>
                            <td style="font-size: 20px;">Full name</td>
                        </tr>
                        <tr>
                            <td style="font-size: 30px;">Muhammad Albert N A</td>
                        </tr>
                    </table>
                </div>
                <div class="logo">
                    <i class='bx bxs-envelope' style="font-size: 80px;"></i>
                    <table border="1" cellpadding="10" cellspacing="5">
                        <tr>
                            <td style="font-size: 20px;">Email</td>
                        </tr>
                        <tr>
                            <td style="font-size: 30px;">alberttnaa16@gmail.com</td>
                        </tr>
                    </table>
                </div>
                <div class="logo">
                    <i class='bx bxs-phone' style="font-size: 80px;"></i>
                    <table border="1" cellpadding="10" cellspacing="5">
                        <tr>
                            <td style="font-size: 20px;">Number Phone</td>
                        </tr>
                        <tr>
                            <td style="font-size: 30px;">0895366968783</td>
                        </tr>
                    </table>
                </div> -->
            </div>
        </div>
    </div>

    <div class="Kotak-3" style="background-color: #5E7D99;">
        <div class="container-3">
            <h1 style="text-align: center; padding-bottom: 50px; font-size: 64px;">What Can I Do</h1>
            <div class="box">
                <div class="card">
                    <i class='bx bx-mobile' style="padding-bottom: 30px;"></i>
                    <h2 style="padding-bottom: 30px;">Mobile Developer</h2>
                    <p>Dalam tahap belajar untuk pembuatan aplikasi mobile dengan menggunakan Framework Flutter</p>
                </div>
                <div class="card">
                    <h2 style="padding-bottom: 50px;">My Portofolio</h2>
                    <p style="padding-bottom: 50px;">Portofolioku terdapat di dalam repository akun github saya </p>
                    <a href="https://github.com/Albertna16?tab=repositories" target="_blank" style="font-size: 25px; color: black;">Visit me</a>
                </div>
                <div class="card">
                    <i class='bx bxl-flutter' style="padding-bottom: 30px;"></i>
                    <h2 style="padding-bottom: 30px;">Flutter Developer</h2>
                    <p>Telah membuat beberapa tampilan aplikasi dengan UI/UX yang bervariasi dengan menggunakan
                        Framework Flutter</p>
                </div>
            </div>
        </div>
    </div>

    <div class="Kotak-4" style="background-color: #575E6D;">
        <div class="container-4">
            <div class="box-4-1">
                <img src="../Biodata diri/image/maps.png" alt="" style="width: 450px;">
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