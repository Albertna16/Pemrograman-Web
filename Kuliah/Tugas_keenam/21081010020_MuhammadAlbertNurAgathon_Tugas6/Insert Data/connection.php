<<<<<<< HEAD
<?php

function connection()
{
    // membuat konekesi ke database system
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "classicmodels";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

    //memilih database yang akan dipakai
    mysqli_select_db($conn, $dbName);

    return $conn;
}
=======
<?php

function connection()
{
    // membuat konekesi ke database system
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "classicmodels";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

    //memilih database yang akan dipakai
    mysqli_select_db($conn, $dbName);

    return $conn;
}
>>>>>>> 98c425f07f850013623e1f6695443ef9ef9b7a0a
