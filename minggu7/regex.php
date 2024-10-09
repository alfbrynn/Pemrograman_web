<?php
$pattern = '/[a-z]/';
$text = 'This is a sample text';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan";
} else {
    echo "Tidak ada huruf kecil";
}

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}

// Pola yang akan dicari: kata "apple"
$pattern = '/apple/';

// Kata pengganti: "banana"
$replacement = 'banana';

// Teks yang akan diubah
$text = 'I like apple pie.';

// Melakukan penggantian menggunakan fungsi preg_replace()
$new_text = preg_replace($pattern, $replacement, $text);

// Menampilkan hasil setelah penggantian
echo $new_text; // Output: I like banana pie.

// Pola yang akan dicari: huruf 'g' diikuti oleh satu atau lebih huruf 'o' dan diakhiri dengan huruf 'd'
$pattern = '/go+d/';

// Teks yang akan dicari pola di dalamnya
$text = 'god is good.';

// Melakukan pencarian pola menggunakan fungsi preg_match()
if (preg_match($pattern, $text, $matches)) {
    // Jika pola ditemukan, tampilkan pesan dan hasil pencocokan
    echo "Cocokkan: " . $matches[0];
} else {
    // Jika pola tidak ditemukan, tampilkan pesan
    echo "Tidak ada yang cocok!";
}

?>