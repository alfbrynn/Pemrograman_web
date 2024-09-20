<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "== Pertanyaan nomer 7 dan 8 ==";
echo "<br>";
echo "hasil dari 10 + 5 = " . $hasilTambah;
echo "<br>";
echo "Hasil dari 10 - 5 = " . $hasilKurang;
echo "<br>";
echo "Hasil dari 10 * 5 = " . $hasilKali;
echo "<br>";
echo "Hasil dari 10 / 5 = " . $hasilBagi;
echo "<br>";
echo "Hasil dari 10 % 5 = " . $sisaBagi;
echo "<br>";
echo "Hasil dari 10 ** 5 =  " . $pangkat;
echo "<br> <br>";

// Pertanyaan 9
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "== Pertanyaan nomer 9 ==";
echo "<br>";
echo "Sama dengan = " . $hasilSama;
echo "<br>";
echo "Tidak sama dengan = " . $hasilTidakSama;
echo "<br>";
echo "Lebih kecil = " . $hasilLebihKecil;
echo "<br>";
echo "Lebih besar = " . $hasilLebihBesar;
echo "<br>";
echo "Lebih kecil sama = " . $hasilLebihKecilSama;
echo "<br>";
echo "Lebih besar sama = " . $hasilLebihBesarSama;
echo "<br> <br>";

// pertanyaan 10
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "== Pertanyaan nomer 10 ==";
echo "<br>";
echo "AND = " . $hasilAnd;
echo "<br>";
echo "OR = " . $hasilOr;
echo "<br>";
echo "NOT A = " . $hasilNotA;
echo "<br>";
echo "NOT B = " . $hasilNotB;
echo "<br> <br>";

// Pertanyaan 11
$penugasanJumlah = $a += $b;
$penugasanKurang = $a -= $b;
$penugasanKali = $a *= $b;
$penugasanBagi = $a /= $b;
$penugasanSisaBagi = $a %= $b;

echo "== Pertanyaan nomer 11 ==";
echo "<br>";
echo "a += b = " . $penugasanJumlah;
echo "<br>";
echo "a -= b = " . $penugasanKurang;
echo "<br>";
echo "a *= b = " . $penugasanKali;
echo "<br>";
echo "a /= b = " . $penugasanBagi;
echo "<br>";
echo "a %= b = " . $penugasanSisaBagi;
echo "<br> <br>";

// pertanyaan 12
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "== Pertanyaan nomer 12 ==";
echo "<br>";
echo "a === b = " . $hasilIdentik;
echo "<br>";
echo "a !== b = " . $hasilTidakIdentik;
echo "<br> <br>";
?>