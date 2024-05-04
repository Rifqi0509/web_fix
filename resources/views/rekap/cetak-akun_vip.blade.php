<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Data</title>
    <link rel="stylesheet" href="{{asset('css/cetak.css')}}">
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Profile Akun VIP</h2>
    <table>
        <thead>
            <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akun_vips as $index => $akunvips)
            <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $akunvips->username }}</td>
            <td>{{ $akunvips->name }}</td>
            <td>{{ $akunvips->email }}</td>
            <td>{{ $akunvips->password }}</td>
            <td>{{ $akunvips->alamat }}</td>
            <td>{{ $akunvips->no_telepon }}</td>
            <td>{{ $akunvips->tanggal_lahir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
