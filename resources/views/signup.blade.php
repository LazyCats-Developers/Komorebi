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
        <title>Registrarte en Komorebi</title>
        <div class= "bg-white sm:bg-blue-300 min-h-screen flex-col flex justify-center items-center space-y-5">
            <div class="w-full bg-white flex-col flex justify-center items-center p-5 sm:w-96 sm:rounded-xl">
                <form class="space-y-5" action="{{ url('/signup') }}" method="POST">
                    @csrf
                    <div class="min-w-full flex-col flex justify-center items-center mb-5">
                        <img class="min-w-full" src="../../img/logo.png" alt="">
                        <p class="text-xl font-medium text-gray-700">Regístrate para crear una cuenta</p>
                    </div>
                    <input type="text" id="name" name="name" placeholder="Nombre" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="text" id="lname" name="lname" placeholder="Apellido" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="text" id="phone" name="phone" placeholder="Telefono" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="text" id="address" name="address" placeholder="Direccion" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="text" id="email" name="email" placeholder="Correo electrónico" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="password" id="password" name="password" placeholder="Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                    <button type="submit" class="min-w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md">
                        Registrar
                    </button>
                </form>
            </div>
            <div class="w-full bg-white flex justify-center items-center p-5 space-x-2 sm:w-96 sm:rounded-xl">
                <p class="text-lg font-medium text-gray-700">¿Tienes una cuenta?</p>
                <a class="text-lg font-medium text-blue-500" href="{{url('/')}}">Inicia sesión</a>
            </div>
        </div>
    </body>
</html>