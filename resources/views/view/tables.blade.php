@extends('app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">Rekapitulasi Jadwal</h4>
            </div>
            <div>
                <p id="reportButton"></p>
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
    </script>
@endsection