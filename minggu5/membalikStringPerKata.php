<?php
$pesan = "Saya arek malang";

// Ubah variabel Pesan menjadi array dengan perintah explode
$pesanPerKata = explode(" ", $pesan);

// Ubah setiap kata dalam array menjadi kebalikannya
$pesanPerKata = array_map(fn($pesan) => strrev($pesan), $pesanPerKata);

// Gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerKata);

echo $pesan . "<br>";
?>