<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Data</title>
    <link rel="stylesheet" href="{{asset('css/cetak.css')}}">
</head>
<body>
    <h2 style="text-align: center;">Laporan Data Profile Akun</h2>
    <table>
        <thead>
            <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role User</th>
            <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $index => $admins)
            <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $admins->name }}</td>
            <td>{{ $admins->email }}</td>
            <td>{{ $admins->name }}</td>
            <td>{{ $admins->password }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
    window.print();
</script>
</body>
</html>
