<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>vip page</title>
  <style>
    h2,
    h3 {
      margin: 0;
    }
  </style>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/vip.css') }}" />
</head>

<body>
  <div class="form-container">
    <img src="{{asset('img/logojember.png')}}" alt="logo" class="img-container">
    <h2>SELAMAT DATANG!</h2>
    <h3>Silahkan Masukan Kode Undangan Tamu Disini!</h3>
    @if (session('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    <br>
    <form action="{{ route('codevip') }}" method="post">
      @csrf <!-- This is important for Laravel to handle the form submission securely -->
      <input type="text" name="kode" placeholder="Masukan Kode" class="form-input">
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</body>

</html>