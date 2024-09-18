<?php
$angka1 = 10;
$angka2 = 5;
$hasil = $angka1 + $angka2;
echo "Hasil pernjumlahan $angka1 dan $angka2 adalah $hasil.";

$benar = true;
$salah = false;
echo "Variabel benar: $benar, ariabel salah: $salah.";

// Mendefinisikan konstanta untuk nilai tetap
define("NAMA_SITUS", "WebsiteKu.com");
define("TAHUN_PENDIRIAN", 2023);

echo "Selamat datang di " . NAMA_SITUS . " situs yang didirikan tahun " . TAHUN_PENDIRIAN . ".";
?>
