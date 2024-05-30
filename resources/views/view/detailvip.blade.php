<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Table</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3 class="card-title" style="display: flex; align-items: center;">
                    <img src="{{ asset('img/vip.png') }}" alt="Verification Image" style="height: 30px; margin-right: 5px;">
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
                            @foreach($vips as $vip)
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
                                    <form action="{{ route('submit.signature') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="vip_id" value="{{ $vip->id }}">
                                        <div class="form-group">
                                            <canvas id="ttdCanvas-{{ $vip->id }}" width="400" height="200" class="border"></canvas>
                                        </div>
                                        <input type="hidden" id="signature-{{ $vip->id }}" name="signature">
                                        <button type="button" onclick="clearCanvas({{ $vip->id }})" class="btn btn-warning">Clear</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $vips->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach($vips as $vip)
            setupCanvas({{ $vip->id }});
            @endforeach
        });

        function setupCanvas(id) {
            var canvas = document.getElementById('ttdCanvas-' + id);
            var ctx = canvas.getContext('2d');
            var drawing = false;

            canvas.addEventListener('mousedown', function(e) {
                drawing = true;
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.beginPath();
                ctx.moveTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            });

            canvas.addEventListener('mousemove', function(e) {
                if (drawing) {
                    ctx.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
                    ctx.stroke();
                }
            });

            canvas.addEventListener('mouseup', function() {
                drawing = false;
                document.getElementById('signature-' + id).value = canvas.toDataURL();
            });
        }

        function clearCanvas(id) {
            var canvas = document.getElementById('ttdCanvas-' + id);
            var ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            document.getElementById('signature-' + id).value = '';
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
