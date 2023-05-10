<?php
function myAge()
{
    $tanggal_lahir = date('Y-m-d', strtotime('2003-01-16'));
    $birthDate = new \DateTime($tanggal_lahir);
    $today = new \DateTime("today");
    if ($birthDate > $today) {
        return "0 tahun 0 bulan 0 hari";
    }
    $y = $today->diff($birthDate)->y;
    // dd($y);
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return "$y tahun, $m bulan, $d hari";
}
