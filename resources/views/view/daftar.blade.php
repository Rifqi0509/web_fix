<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/formulir.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        table {
            border: 1px solid #dee2e6;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 order-md-first image-container mt-5 d-flex flex-column align-items-center">
            <img src="{{asset('img/form.png')}}" alt="Gambar" style="margin-top: -20px; width: 80%; height: 11%;">
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
                    <h2 class="card-title">Daftar Tamu Kunjungan</h2>
                </div>
                <!-- End Judul "Tamu Kunjungan" dan Menu Dropdown -->

                <div class="card-body w-100">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Keperluan</th>
                                <th>Asal Instansi</th>
                                <th>No HP</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visitors as $index => $visitor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $visitor->nama }}</td>
                                <td>{{ $visitor->alamat }}</td>
                                <td>{{ $visitor->keperluan }}</td>
                                <td>{{ $visitor->asal_instansi }}</td>
                                <td>{{ $visitor->no_hp }}</td>
                                <td>{{ $visitor->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
