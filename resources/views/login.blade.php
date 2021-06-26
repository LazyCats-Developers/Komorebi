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
            <div class ="w-full bg-white flex-col flex justify-center items-center p-5 sm:w-96 sm:rounded-xl">
                <form method="POST" class="space-y-5" action="home.php">
                    <img class="min-w-full mb-5" src="../../img/logo.png" alt="">
                    <input type="email" id="email" name="email" placeholder="Correo Electronico" class="border border-gray w-full rounded-md py-3 px-4">
                    <input type="password" id="password" name="password" placeholder="Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                    <a type="submit" href="{{ url('/main')}}" class="flex justify-center min-w-full transition duration-300 ease-in-out transform hover:-translate-y-0 hover:scale-100 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md">
                        Iniciar sesión
                    </a>
                </form>
            </div>
            <div class="w-full bg-white flex justify-center items-center p-5 space-x-2 sm:w-96 sm:rounded-xl">
                <p class="text-lg font-medium text-gray-700">¿No tienes una cuenta?</p>
                <a class="text-lg font-medium text-blue-500" href="{{ url('/signup') }}">Regístrate</a>
            </div>
        </div>
    </body>
</html>