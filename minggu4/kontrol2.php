<?php
$hargaProduk = 120000;
$diskon = 20 / 100;
$diskon = $diskon * $hargaProduk;
$hargaSetelahDiskon = $hargaProduk - $diskon;
echo "Harga yang harus dibayar pelanggan: $hargaSetelahDiskon";
?>