<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Include the Font Awesome CSS for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Signature Pad CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0/dist/signature-pad.css">

    <!-- Signature Pad Library -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0"></script>

</head>

<body>
    <div class="container-fluid mt-5">
        <div class="card">
        <div class="card-header bg-secondary text-white">
            <h3 class="card-title" style="display: flex; align-items: center;">
                <img src="{{asset('img/vip.png')}}" alt="Verification Image" style="height: 30px; margin-right: 5px;">
                Halaman Verifikasi Data Kedatangan Tamu Vip
            </h3>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>KD.Undangan</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Keperluan</th>
                                <th>Instansi</th>
                                <th>No HP</th>
                                <th>Tgl Temu</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Departemen</th>
                                <th>Seksi</th>
                                <th>Keterangan</th>
                                <th>Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Your PHP loop to populate table rows -->
                            <!-- Sample row -->
                            <tr>
                            @php
                    $currentPage = $vips->currentPage() ?? 1; // Get current page
                    $startNumber = ($currentPage - 1) * 10 + 1; // Calculate starting number
                    @endphp
                    <!-- Looping through vips, but limited to 10 per page -->
                    @foreach($vips as $index => $vip)
                    <tr>
                        <td>{{ ($vips->currentPage() - 1) * $vips->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $vip->kd_undangan }}</td>
                        <td>{{ $vip->nama }}</td>
                        <td>{{ $vip->alamat }}</td>
                        <td>{{ $vip->keperluan }}</td>
                        <td>{{ $vip->asal_instansi }}</td>
                        <td>{{ $vip->no_hp }}</td>
                        <td>{{ $vip->tanggal }}</td>
                        <td>{{ $vip->jam }}</td> 
                        <td>{{ $vip->status }}</td>
                        <td>{{ $vip->departemen }}</td>
                        <td>{{ $vip->seksi }}</td>
                        <td>{{ $vip->ket }}</td>

                        <td>
                        <canvas id="signatureCanvas{{ $vip->id }}" width="300" height="200" style="border: 1px solid #000;"></canvas>
                        <button onclick="clearSignature({{ $vip->id }})" class="btn btn-warning">Clear</button>
                        <button onclick="submitSignature({{ $vip->id }})" class="btn btn-primary">Submit</button>
                        </td>

                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function submitSignature(vipId) {
        var canvas = document.getElementById('signatureCanvas' + vipId);
        var signatureData = canvas.toDataURL(); // Get base64 encoded image data
        // Now you can send this signatureData to your server for processing
        console.log('Signature data:', signatureData);
        // Example of alerting the signature data
        alert('Signature data: ' + signatureData);
    }
</script>





</body>

</html>
