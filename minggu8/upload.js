// $(document).ready(function () {
//   $("#upload-form").submit(function (e) {
//     e.preventDefault();

//     var formData = new FormData(this);

//     $.ajax({
//       type: "POST",
//       url: "upload_ajax.php",
//       data: formData,
//       cache: false,
//       contentType: false,
//       processData: false,
//       success: function (response) {
//         $("#status").html(response);
//       },
//       error: function () {
//         $("#status").html("Terjadi kesalahan saat mengunggah file.");
//       },
//     });
//   });
// });

$(document).ready(function () {
  // Ketika input file berubah (ada file yang dipilih)
  $("#file").change(function () {
    if (this.files.length > 0) {
      // Jika ada file yang dipilih, aktifkan tombol unggah
      $("#upload-button").prop("disabled", false).css("opacity", 1);
    } else {
      // Jika tidak ada file yang dipilih, nonaktifkan tombol unggah
      $("#upload-button").prop("disabled", true).css("opacity", 0.5);
    }
  });

  // Ketika formulir di-submit
  $("#upload-form").submit(function (e) {
    e.preventDefault(); // Mencegah pengiriman formulir secara default

    // Buat objek FormData untuk menyimpan data formulir
    var formData = new FormData(this);

    // Kirim data menggunakan AJAX
    $.ajax({
      type: "POST",
      url: "upload_ajax.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        // Tampilkan pesan sukses atau gagal di elemen dengan id "status"
        $("#status").html(response);
      },
      error: function () {
        $("#status").html("Terjadi kesalahan saat mengunggah file.");
      },
    });
  });
});
