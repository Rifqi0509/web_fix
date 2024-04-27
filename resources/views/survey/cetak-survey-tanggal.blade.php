<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Data</title>
    <link rel="stylesheet" href="{{asset('css/cetak.css')}}">
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Tamu Kunjungan</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Pertanyaan</th>
                <th>Baik</th>
                <th>Sangat Baik</th>
                <th>Buruk</th>
                <th>Sangat Buruk</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cetakPertanggal as $index => $survey)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $survey->question }}</td>
                <td>{{ $survey->baik }}</td>
                <td>{{ $survey->sangat_baik }}</td>
                <td>{{ $survey->buruk }}</td>
                <td>{{ $survey->sangat_buruk }}</td>
                <td>{{ $survey->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
