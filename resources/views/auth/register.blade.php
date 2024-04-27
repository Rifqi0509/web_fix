<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/daftar.css"/>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-80">
            <h2 class="text-2xl font-semibold mb-6">Register</h2>
            
            <form method="post" action="{{route('register')}}" >
                @csrf
                <div class="username">
                    <div class="block mb-2">Username</div>
                    <input type="text" name="name" id="name" class="w-full p-2 border rounded" >
                </div>
                <div class="email">
                    <div class="block mb-2">Email</div>
                    <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
                </div>
                <div class="password">
                    <div class="block mb-2">Password</div>
                    <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
                </div>
                    <button type="submit" class="register">Register</button>
                    <p>Sudah Punya Akun? <a href="/login" class="masuk">Masuk Sekarang</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
