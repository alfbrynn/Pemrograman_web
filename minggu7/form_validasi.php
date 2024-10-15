<!-- <!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form method="post" action="proses_validasi.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
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
                var nama = $('#nama').val();
                var email = $('#email').val();
                var valid = true;

                if (nama === "") {
                    valid = false;
                    $('#nama-error').text("Nama harus diisi.");
                } else {
                    $('#nama-error').text("");
                }

                if (email === "") {
                    valid = false;
                    $('#email-error').text("Email harus diisi.");
                } else {
                    // Tambahkan validasi email lebih lanjut jika diperlukan
                    $('#email-error').text("");
                }

                // Mencegah pengiriman form jika validasi gagal
                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>