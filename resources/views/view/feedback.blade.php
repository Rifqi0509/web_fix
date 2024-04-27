@extends('app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/popup.css">
</head>
<div class="card">
    <div class="card-body">
    <h4 class="font-weight-bold mb-0">Data Feedback User</h4>
    <br>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="exportDropdownButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 20px;">
                    Rekap
                </button>
                <ul class="dropdown-menu" aria-labelledby="exportDropdownButton">
                    <li><a class="dropdown-item" href="{{ route('cetak-feedback-form') }}" id="exportPdfButton"><i class="fas fa-file-pdf"></i> PDF</a></li>
                    <li><a class="dropdown-item" href="{{ route('excel-feedback') }}" id="exportExcelButton"><i class="fas fa-file-excel"></i> Excel</a></li>
                </ul>
            </div>
 
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="table-list">
            <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($feedbacks as $index => $feedback)
                                    <tr>
                                        <td>{{ ($feedbacks->currentPage() - 1) * $feedbacks->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $feedback->keterangan }}</td>
                                        <td>{{ $feedback->created_at }}</td>
                                        <td>
                                        <button onclick="togglePopupedit({{ $feedback->id }})" class="btn btn-success" style="color: white; padding: 5px 10px; height: auto;"> 
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </button><br><br>
                                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" class="delete-form">
                                            @method('delete')
                                            @csrf
                                            <button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-danger" style="color: white; padding: 5px 10px; height: auto;">
                                                <i class="fas fa-trash-alt"></i>&nbsp;Delete
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

<br>
                        <!-- Pagination -->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ ($feedbacks->onFirstPage()) ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $feedbacks->previousPageUrl() }}">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $feedbacks->lastPage(); $i++)
                                <li class="page-item {{ ($feedbacks->currentPage() == $i) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $feedbacks->url($i) }}">{{ $i }}</a>
                                </li>
                                @endfor
                                <li class="page-item {{ ($feedbacks->currentPage() == $feedbacks->lastPage()) ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $feedbacks->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Pagination -->
                


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

    // Function to toggle popup
    function togglePopup() {
        var popup = document.getElementById('popup');
        if (popup.style.display === 'none') {
            popup.style.display = 'block';
        } else {
            popup.style.display = 'none';
        }
    }

    // Function to toggle popup edit
    function togglePopupedit() {
        var popup = document.getElementById('popupedit');
        if (popup.style.display === 'none') {
            popup.style.display = 'block';
        } else {
            popup.style.display = 'none';
        }
    }

    function konfirmasiHapus() {
            // Menampilkan jendela konfirmasi dengan pesan khusus
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                // Jika pengguna mengklik "OK", lakukan penghapusan
                hapusData();
            } else {
                // Jika pengguna mengklik "Batal", tidak lakukan apa-apa
                return;
            }
        }

        function hapusData() {
            // Di sini Anda akan menempatkan kode untuk menghapus data
            alert("Data berhasil dihapus!"); // Contoh pesan konfirmasi
        }
</script>
@endsection
