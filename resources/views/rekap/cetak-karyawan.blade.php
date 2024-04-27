<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Data</title>
    <link rel="stylesheet" href="{{asset('css/cetak.css')}}">
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIPD</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Divisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $index => $karyawan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $karyawan->nipd }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td>{{ $karyawan->divisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
