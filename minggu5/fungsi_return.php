<?php
//membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

echo "Umur saya adalah " . hitungUmur(1998, 2023) . " tahun"; // Isi sesuai dengan tahun lahir kalian
?>