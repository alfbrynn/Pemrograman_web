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

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span id="password-error" style="color: red;"></span><br>

    <input type="submit" value="Submit">
  </form>

  <script>
  $(document).ready(function() {
    $('#myForm').submit(function(event) {
      event.preventDefault(); // Mencegah pengiriman form default

      var nama = $('#nama').val();
      var email = $('#email').val();
      var password = $('#password').val();

      // Reset pesan error
      $('#nama-error').text("");
      $('#email-error').text("");
      $('#password-error').text("");

      // Validasi password minimal 8 karakter
      if (password.length < 8) {
        $('#password-error').text("Password minimal 8 karakter.");
        return; // Hentikan pengiriman jika password tidak valid
      }

      $.ajax({
        url: "proses_validasi.php",
        type: "POST",
        data: {
          nama: nama,
          email: email,
          password: password
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
            if (response.errors.password) {
              $('#password-error').text(response.errors.password);
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
