<?php
$menu = [
    [
    "nama" => "Beranda"
    ],
    [
    "nama" => "Berita",
    "subMenu" => [
        [
            "nama" => "Wisata",
            "subMenu" => [
                [
                "nama" => "Pantai"
                ],
                [
                "nama" => "Gunung"
                ]
            ]
        ],
        [
        "nama" => "Kuliner"
        ],
        [
        "nama" => "Hiburan"
        ]
    ]
    ],
    [
    "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

// function tampilkanMenuBertingkat(array $menu) {
//     echo "<ul>";

//     foreach ($menu as $key => $item) {
//         echo "<li>{$item['nama']}</li>";
//     }

//     echo "</ul>";
// }

tampilkanMenuBertingkat($menu);

function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";

    foreach ($menu as $item) {
        echo "<li>{$item['nama']}</li>";

        // Cek apakah item memiliki subMenu
        if (isset($item['subMenu'])) {
            // Panggil fungsi ini secara rekursif untuk menampilkan subMenu
            tampilkanMenuBertingkat($item['subMenu']);
        }
    }

    echo "</ul>";
}
?>