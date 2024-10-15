<?php
$pattern = '/[a-z]/';
$text = 'This is a sample text';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan";
} else {
    echo "Tidak ada huruf kecil";
}

echo "<br><br>";

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

echo "<br><br>";

$pattern = '/apple/'; // Pola yang akan dicari: kata "apple"
$replacement = 'banana'; // Kata pengganti: "banana"
$text = 'I like apple pie.'; // Teks yang akan diubah
$new_text = preg_replace($pattern, $replacement, $text); // Melakukan penggantian menggunakan fungsi preg_replace()
// Menampilkan hasil setelah penggantian
echo $new_text; // Output: I like banana pie.

echo "<br><br>";

$pattern = '/[o]{1,3}/'; // Pola yang akan dicari: huruf 'g' diikuti oleh satu atau lebih huruf 'o' dan diakhiri dengan huruf 'd'
$text = 'god is good.'; // Teks yang akan dicari pola di dalamnya
if (preg_match($pattern, $text, $matches)) { // Melakukan pencarian pola menggunakan fungsi preg_match()
    // Jika pola ditemukan, tampilkan pesan dan hasil pencocokan
    echo "Cocokkan: " . $matches[0];
} else {
    // Jika pola tidak ditemukan, tampilkan pesan
    echo "Tidak ada yang cocok!";
}
?>