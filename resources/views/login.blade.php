<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
</head>
<body>
<title>Iniciar sesión en Komorebi</title>
<div class="bg-white min-h-screen w-full flex-col flex justify-center items-center space-y-5 sm:bg-blue-300">
    <div class="w-full bg-white flex-col flex justify-center items-center p-5 lg:w-72 2xl:w-96 sm:rounded-xl">
        <form method="POST" class="space-y-5" action="{{ route('login') }}">
            @csrf
            <img class="min-w-full mb-5" src="{{ asset('img/logo.png') }}" alt="">
            <input type="email" id="email" name="email" placeholder="Correo Electronico" class="border border-gray w-full rounded-md py-3 px-4 text-sm 2xl:text-lg" required>
            <input type="password" id="password" name="password" placeholder="Contraseña" class="border border-gray w-full rounded-md py-3 px-4 text-sm 2xl:text-lg" required>
            <input type="checkbox" id="remember" name='remember'><label for="remember" class="text-sm 2xl:text-lg"> Recuérdame</label>
            <button class="min-w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600">
                Iniciar sesión
            </button>
        </form>
    </div>
    <div class="w-full bg-white flex justify-center items-center p-5 space-x-2 lg:w-72 2xl:w-96 sm:rounded-xl">
        <p class="text-gray-700 text-sm 2xl:text-lg">¿No tienes una cuenta?</p>
        <a class="text-blue-500 text-sm 2xl:text-lg" href="{{ route('signup') }}">Regístrate</a>
    </div>
</div>
</body>
</html>
