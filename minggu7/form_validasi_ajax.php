<!DOCTYPE html>
<html>
<head>
  <title>Form Input dengan Validasi Ajax</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <h1>Form Input dengan Validasi Ajax</h1>
  <form id="myForm">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    <span id="nama-error" style="color: red;"></span><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <span id="email-error" style="color: red;"></span><br>

    <input type="submit" value="Submit">
  </form>

  <script>
  $(document).ready(function() {
    $('#myForm').submit(function(event) {
      event.preventDefault(); // Mencegah pengiriman form default

      var nama = $('#nama').val();
      var email = $('#email').val();

      // Reset pesan error
      $('#nama-error').text("");
      $('#email-error').text("");

      $.ajax({
        url: "proses_validasi.php",
        type: "POST",
        data: {
          nama: nama,
          email: email
        },
        success: function(response) {
          if (response.errors) {
            // Menampilkan pesan error dari respon PHP
            if (response.errors.nama) {
              $('#nama-error').text(response.errors.nama);
            }
            if (response.errors.email) {
              $('#email-error').text(response.errors.email);
            }
          } else {
            // Formulir valid, lakukan tindakan selanjutnya (misalnya: menampilkan pesan sukses)
            alert("Data berhasil dikirim!");
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error("Error:", textStatus, errorThrown);
          // Tampilkan pesan error generik jika terjadi kesalahan Ajax
          alert("Terjadi kesalahan saat memproses data.");
        }
      });
    });
  });
  </script>
</body>
</html>