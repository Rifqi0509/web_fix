<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Data</title>
    <link rel="stylesheet" href="{{asset('css/cetak.css')}}">
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Feedback</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cetakPertanggal as $index => $feedback)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $feedback->keterangan }}</td>
                <td>{{ $feedback->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
