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
    <div class="container-fluid">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar content here -->
            <div class="image-container d-flex flex-column justify-content-end" style="background-color: #f4f4f4; padding: 20px; color: rgb(19, 5, 5);">
                <img src="{{asset('img/form.png')}}" alt="Gambar" style="width: 80%; height: 20%;" class="mx-auto d-block">
                <!-- Tautan terpisah di bawah gambar -->
                <a class="btn btn-secondary mt-3" href="{{ route('form-kunjungan') }}">Formulir Kunjungan</a>
                <a class="btn btn-secondary mt-1" href="{{ route('daftartamukunjungan') }}">Buku Kunjungan Tamu</a>
                <a class="btn btn-secondary mt-1" href="/">Home</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title text-center">Formulir Tamu Kunjungan</h2>
                    </div>
                    <div class="card-body">
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

                            <label for="ttd">Tanda Tangan</label>
                            <div class="form-group">
                                <canvas id="ttdCanvas" name="signature" width="400" height="200" class="border"></canvas>
                            </div>

                            <input type="hidden" id="signature" name="signature">

                            <div class="form-group d-flex justify-content-center">
                                <button type="button" class="btn btn-danger mr-2" onclick="clearCanvas()">Hapus Tanda Tangan</button>
                                <button type="button" class="btn btn-success" onclick="saveSignature()">Simpan Tanda Tangan</button>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 20%;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- End Main Content -->
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
            document.getElementById('signature').value = signature;
        }

        document.querySelector('form').addEventListener('submit', function() {
            saveSignature();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>