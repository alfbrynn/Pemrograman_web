<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

$nilaiTertinggi = max($nilaiSiswa);
$nilaiTerengah = min($nilaiSiswa);

$totalNilai = 0;
$jumlahNilaiValid = 0;

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 0 && $nilai <= 100) {
        $totalNilai += $nilai;
        $jumlahNilaiValid++;
    }
}

$rataRata = $totalNilai / $jumlahNilaiValid;

echo "Total nilai setelah mengabaikan dua nilai tertinggi dan terendah: $totalNilai";
echo "<br>";
echo "Rata rata nilai: " . $rataRata;
?> 