@extends('app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/popup.css">
</head>

<div class="card">
    <div class="card-body">
        <h4 class="font-weight-bold mb-0">Data Tamu Kunjungan VIP</h4>
        <br>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tanggalAwal" class="form-label">Tanggal Awal</label>
                <input type="date" name="tanggalAwal" id="tanggalAwal" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="tanggalAkhir" class="form-label">Tanggal Akhir</label>
                <input type="date" name="tanggalAkhir" id="tanggalAkhir" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <div class="input-group">
                    <a href="" onClick="this.href='/cetak-vip-tanggal/'+document.getElementById('tanggalAwal').value +
                    '/' +document.getElementById('tanggalAkhir').value" 
                    target="_blank" class="btn btn-primary btn-block" style="color: #fff">Cetak Laporan 
                        <i class="fas fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mendapatkan tombol "Report"
    var reportButton = document.getElementById('reportButton');

    // Mendapatkan tanggal hari ini
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    // Mengganti teks tombol dengan tanggal hari ini
    reportButton.innerHTML = today;

    // Function to toggle popup
    function togglePopup() {
        var popup = document.getElementById('popup');
        if (popup.style.display === 'none') {
            popup.style.display = 'block';
        } else {
            popup.style.display = 'none';
        }
    }
</script>
@endsection
