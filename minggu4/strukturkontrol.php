<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} else ($nilaiNumerik >= 80 && $nilaiNumerik <= 89) {
    echo "Nilai huruf: B";
} else ($nilaiNumerik >= 70 && $nilaiNumerik <= 79) {
    echo "Nilai huruf: C";
} else ($nilaiNumerik >= 60 && $nilaiNumerik <= 69) {
    echo "Nilai huruf: D";
} 

// pertanyaan 15
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
?>
