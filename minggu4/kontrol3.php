<?php
$poin = 500;
$totalSkor = $poin;
$dapatHadiah = ($totalSkor > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: $totalSkor <br>";
echo "Apakah anda dapat hadiah? " . $dapatHadiah;
?>