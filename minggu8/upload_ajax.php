<!-- <?php
if (isset($_FILES['file'])) {
    $errors = array();

    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    @$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $extensions = array("pdf", "doc", "docx", "txt");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, TXT.";
    }

    if ($file_size > 1000000) {
        $errors[] = "Ukuran file tidak boleh lebih dari 1 MB";
    }

    if (empty($errors) === true) {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "File berhasil diunggah.";
    } else {
        echo implode(", ", $errors);
    }
}
?> -->

<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $max_size = 1000000; // Ukuran maksimum 1MB
    $total_files = count($_FILES['files']['name']); // Menghitung jumlah file yang diunggah

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $total_files; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        @$file_ext = strtolower(end(explode('.', $file_name)));

        // Periksa ekstensi file
        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "File $file_name memiliki ekstensi yang tidak diizinkan. Hanya file gambar (JPG, JPEG, PNG, GIF) yang diizinkan.";
        }

        // Periksa ukuran file
        if ($file_size > $max_size) {
            $errors[] = "File $file_name melebihi ukuran maksimum 1 MB.";
        }

        // Jika tidak ada kesalahan, pindahkan file ke direktori penyimpanan
        if (empty($errors)) {
            move_uploaded_file($file_tmp, "documents/" . $file_name);
            echo "File $file_name berhasil diunggah.<br>";
        }
    }

    // Jika ada kesalahan, tampilkan semua kesalahan
    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
