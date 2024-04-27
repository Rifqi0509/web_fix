@extends('app')

@section('content')
<div class="card">
    <div class="card-body">
    <h4 class="font-weight-bold mb-0">Data Survey Kepuasan Pengguna</h4>
    <br>
<div class="d-flex justify-content-between align-items-center mt-3 mb-3">

 <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdownButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px;">
            Rekap
        </button>
        <ul class="dropdown-menu" aria-labelledby="exportDropdownButton">
            <li><a class="dropdown-item" href="{{ route('cetak-questions') }}" target="_blank" id="exportPdfButton"><i class="fas fa-file-pdf"></i> PDF</a></li>
            <li><a class="dropdown-item" href="{{ route('excel-questions') }}" id="exportExcelButton"><i class="fas fa-file-excel"></i> Excel</a></li>
        </ul>
    </div>

</div>

<!-- SECTION CONTAINER TABEL -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table-list">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Baik</th>
                                    <th>Sangat Baik</th>
                                    <th>Buruk</th>
                                    <th>Sangat Buruk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($surveys as $index => $survey)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $survey->baik }}</td>
                                        <td>{{ $survey->sangat_baik }}</td>
                                        <td>{{ $survey->buruk }}</td>
                                        <td>{{ $survey->sangat_buruk }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<!-- END SECTION CONTAINER TABEL -->


<!-- Pagination -->
<br></br>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ ($surveys->onFirstPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $surveys->previousPageUrl() }}">Previous</a>
        </li>
        @for ($i = 1; $i <= $surveys->lastPage(); $i++)
        <li class="page-item {{ ($surveys->currentPage() == $i) ? 'active' : '' }}">
            <a class="page-link" href="{{ $surveys->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
        <li class="page-item {{ ($surveys->currentPage() == $surveys->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $surveys->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>
<!-- End Pagination -->

<script>

    // Export to PDF
    document.getElementById('exportPdfButton').addEventListener('click', function() {
        // Your logic for exporting to PDF goes here
        console.log('Export to PDF clicked');
    });

    // Export to Excel
    document.getElementById('exportExcelButton').addEventListener('click', function() {
        // Your logic for exporting to Excel goes here
        console.log('Export to Excel clicked');
    });

</script>
@endsection
