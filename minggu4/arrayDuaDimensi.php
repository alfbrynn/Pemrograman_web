<?php
$nilaiSiswa = [
    ["nama" => "Alice", "nilai" => 85],
    ["nama" => "Bob", "nilai" => 92],
    ["nama" => "Charlie", "nilai" => 78],
    ["nama" => "David", "nilai" => 64],
    ["nama" => "Eva", "nilai" => 90],
];

$totalNilai = 0;
$jumlahSiswa = count($nilaiSiswa);

foreach ($nilaiSiswa as $siswa) {
    $totalNilai += $siswa["nilai"];
}

$rataRata = $totalNilai / $jumlahSiswa;

echo "Siswa yang nilainya di atas rata rata (" . $rataRata . "): <br>";

foreach ($nilaiSiswa as $siswa) {
    if ($siswa["nilai"] >= $rataRata) {
        echo $siswa["nama"] . " (" . $siswa["nilai"] . ") <br>";
    }
}