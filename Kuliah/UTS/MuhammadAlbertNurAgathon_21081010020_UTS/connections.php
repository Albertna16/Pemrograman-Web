<?php

function connection()
{
    // membuat konekesi ke database system
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = "transupn";

    $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

    //memilih database yang akan dipakai
    mysqli_select_db($conn, $dbName);

    return $conn;
}
