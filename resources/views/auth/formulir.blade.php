<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/formulir.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="container mt-5">
<div class="row">
        <div class="col-md-3 order-md-first image-container mt-5 d-flex flex-column align-items-center">
            <img src="{{asset('img/form.png')}}" alt="Gambar" style="margin-top: -20px; width: 100%; height: 20%;">
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('form-kunjungan') }}">Formulir Kunjungan</a>
                    <a class="dropdown-item" href="{{ route('daftartamukunjungan') }}">Buku Kunjungan Tamu</a>
                    <a class="dropdown-item" href="/">Home</a>
                </div>
            </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <!-- Judul "Tamu Kunjungan" dan Menu Dropdown -->
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <h2 class="card-title">Tamu Kunjungan</h2>
                    </div>
                    <!-- End Judul "Tamu Kunjungan" dan Menu Dropdown -->

            <div class="card-body w-100">
                <form action="/daftar" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <input type="text" id="keperluan" name="keperluan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="asal_instansi">Asal Instansi</label>
                        <input type="text" id="asal_instansi" name="asal_instansi" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="tel" id="no_hp" name="no_hp" class="form-control" pattern="[0-9]{10,}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="ttd">Tanda Tangan</label>
                        <canvas id="ttdCanvas" width="400" height="200" class="border"></canvas>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary mr-2" onclick="clearCanvas()">Hapus Tanda Tangan</button>
                        <button type="button" class="btn btn-primary" onclick="saveSignature()">Simpan Tanda Tangan</button>
                    </div>

                    <div class="text-center mt-4">
    <button type="submit" class="btn btn-secondary" style="width: 100%;">Submit</button>
</div>

                </form>
            </div>
        </div>
    </div>

    <script>
        var canvas = document.getElementById('ttdCanvas');
        var ctx = canvas.getContext('2d');
        var drawing = false;
        var signature = '';
        canvas.addEventListener('mousedown', function(e) {
            drawing = true;
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.beginPath();
            ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
        });
        canvas.addEventListener('mousemove', function(e) {
            if (drawing === true) {
                ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
                ctx.stroke();
            }
        });
        canvas.addEventListener('mouseup', function() {
            drawing = false;
            signature = canvas.toDataURL(); // Simpan tanda tangan sebagai data URL
        });
        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signature = '';
        }
        function saveSignature() {
            // Simpan tanda tangan, Anda dapat mengirimnya ke server atau melakukan apa pun yang Anda butuhkan di sini
            console.log('Tanda Tangan: ' + signature);
        }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
