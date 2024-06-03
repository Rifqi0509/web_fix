<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
        }

        .sidebar {
            background-color: #f4f4f4;
            padding: 20px;
            color: rgb(19, 5, 5);
            margin-bottom: 20px;
        }

        .card {
            margin-top: 20px;
        }

        /* Mobile styles (up to 576px) */
        @media (max-width: 576px) {
            .sidebar {
                text-align: center;
            }

            .sidebar img {
                width: 100%;
                height: auto;
            }

            .sidebar a {
                display: block;
                margin: 10px auto;
            }

            .card {
                margin: 10px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-group input, 
            .form-group textarea {
                font-size: 14px;
            }

            .btn {
                width: 100%;
                margin-top: 10px;
            }

            .card-title {
                font-size: 18px;
            }

            #ttdCanvas {
                width: 100% !important;
                height: auto;
            }
        }

        /* Tablet styles (577px to 768px) */
        @media (min-width: 577px) and (max-width: 768px) {
            .sidebar {
                text-align: center;
            }

            .sidebar img {
                width: 80%;
                height: auto;
            }

            .sidebar a {
                display: block;
                margin: 10px auto;
            }

            .card {
                margin: 10px;
            }

            .form-group label {
                font-size: 16px;
            }

            .form-group input, 
            .form-group textarea {
                font-size: 16px;
            }

            .btn {
                width: 100%;
                margin-top: 10px;
            }

            .card-title {
                font-size: 20px;
            }

            #ttdCanvas {
                width: 100% !important;
                height: auto;
            }
        }

        .sidebar {
            margin-top: 10%;
            margin-left: 5%;
            z-index: 1;
        }

        .card {
            position: relative;
            z-index: 0;
        }

        @media (min-width: 769px) {
            .sidebar {
                position: fixed;
                width: 20%;
                height: 100%;
                top: 0;
                left: 0;
            }

            .sidebar img {
                width: 80%;
                height: auto;
            }

            .sidebar a {
                display: block;
                margin: 10px auto;
            }

            .card {
                margin-left: 5%;
                width: 70%;
            }

            .form-group label {
                font-size: 18px;
            }

            .form-group input, 
            .form-group textarea {
                font-size: 18px;
            }

            .btn {
                width: 100%;
                margin-top: 10px;
            }

            .card-title {
                font-size: 24px;
            }

            #ttdCanvas {
                width: 400px;
                height: 200px;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid">
        <!-- Sidebar -->
        <div class="sidebar bg-light p-3">
            <!-- Sidebar content here -->
            <div class="image-container d-flex flex-column align-items-center">
                <img src="{{ asset('img/form.png') }}" alt="Gambar" class="img-fluid mb-3">
                <!-- Tautan terpisah di bawah gambar -->
                <a class="btn btn-secondary w-100 mb-2" href="{{ route('form-kunjungan') }}">Formulir Kunjungan</a>
                <a class="btn btn-secondary w-100" href="/">Home</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title text-center">Formulir Tamu Kunjungan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('daftar')}}" method="post">
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
                                <button type="submit" class="btn btn-primary" style="width: 30%;">Submit</button>
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

    function getCoordinates(event) {
        var x, y;
        if (event.touches && event.touches.length > 0) {
            x = event.touches[0].clientX - canvas.getBoundingClientRect().left;
            y = event.touches[0].clientY - canvas.getBoundingClientRect().top;
        } else {
            x = event.clientX - canvas.getBoundingClientRect().left;
            y = event.clientY - canvas.getBoundingClientRect().top;
        }
        return { x, y };
    }

    function startDrawing(event) {
        drawing = true;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.beginPath();
        var coords = getCoordinates(event);
        ctx.moveTo(coords.x, coords.y);
        event.preventDefault();
    }

    function draw(event) {
        if (drawing) {
            var coords = getCoordinates(event);
            ctx.lineTo(coords.x, coords.y);
            ctx.stroke();
        }
        event.preventDefault();
    }

    function stopDrawing() {
        if (drawing) {
            drawing = false;
            signature = canvas.toDataURL(); // Simpan tanda tangan sebagai data URL
        }
    }

    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseleave', stopDrawing);

    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);
    canvas.addEventListener('touchcancel', stopDrawing);

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
