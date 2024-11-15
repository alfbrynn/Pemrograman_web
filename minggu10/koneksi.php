 <?php
//  Koneksi ke database
$koneksi = mysql_connect("localhost", "root", "", "prakwebdb");

// Periksa koneksi
if (mysql_connect()) {
    die("koneksi database gagal: " . mysql_connect_error());
}   