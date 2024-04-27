<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/popup.css" />
 
</head>
<body>
    <!--   MODAL POP UP-->
<div class="popup-overlay" id="popup">
        <div class="popup-content">
            <span class="popup-close" onclick="closePopup()">&times;</span>
            <h2>Tambah Data</h2>
            <form action="/submit-form" method="POST">
                <label for="nama">Nama:</label><br>
                <input type="text" id="nama" name="nama" required><br>
                <label for="alamat">Alamat:</label><br>
                <input type="text" id="alamat" name="alamat" required><br>
                <label for="keperluan">Keperluan:</label><br>
                <input type="text" id="keperluan" name="keperluan" required><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
<!-- END MODAL POP UP-->
    <script>
       // Fungsi untuk membuka pop-up
     function openPopup() {
            document.getElementById("popup").style.display = "flex";
        }

        // Fungsi untuk menutup pop-up
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>
</body>
</html>
