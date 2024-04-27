<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/masuk.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-7upumXv5vmNnu7NyVCNZLyY/zXn7cZz7Q1dBcJKiylf9rWgx01O0GB6IuQ8RP4CJ2aSc8szT0ZcazR0StR/abQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            width: 90%;
            max-width: 600px; /* Atur lebar maksimum jika Anda ingin batas maksimum */
            margin: 0 auto; /* Membuat container berada di tengah */
        }
    </style>
</head>

<body class="body">
    <div class="flex justify-center items-center h-screen">
        <div class="container">
        
        <img src="img/user.png" alt="logo" style="height: 100px;" class="containergambar"/>
            <i class="fas fa-users text-6xl text-gray-500 mb-6"></i>
            <div class="bg-white p-8 rounded shadow-md relative">
                <i class="fas fa-sign-in-alt text-6xl text-gray-500 absolute -top-6 left-1/2 transform -translate-x-1/2"></i>
                <h2 class="text-2xl font-semibold mb-6">Company Login!</h2>
                @include('component.flash')
                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div class="email">
                        <label for="email" class="forgot-password">Email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border rounded">
                    </div>
                    @error('email')
                        <small>{{$message}}</small>
                        @enderror
                    <div class="password">
                        <label for="password" class="forgot-password">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-2 border rounded">
                    </div>
                    @error('password')
                        <small>{{$message}}</small>
                        @enderror
                    <div class="mb-4">
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </div>
                    <div>
                        <button type="submit" class="login"><b>Login</b></button>
                       
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{$message}}');
    </script>
    @endif
</body>
</html>
