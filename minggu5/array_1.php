<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Array terindeks</h2>
<?php
    $Listdosen=["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    echo $Listdosen[2] . "<br>";
    echo $Listdosen[0] . "<br>";
    echo $Listdosen[1] . "<br>";

    $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    foreach ($Listdosen as $dosen) {
        echo $dosen . "<br>";
    } 
?>
</body>
</html>