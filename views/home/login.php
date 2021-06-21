<?php
  include('../templates/header.php');
?>
<body class="bg-blue-200">
    <title>Komorebi</title>
    <div class="min-h-screen flex justify-center items-center">
        <form action="home.php">
            <div class ="bg-white px-5 py-10 rounded-3xl flex flex-col items-center space-y-10">
                <img src="../../img/logo.png" alt="">
                <input type="text" id="userlog" name="user" placeholder="Correo Electronico" class="border border-gray w-full rounded-md py-3 px-4">
                <input type="text" id="passlog" name="pass" placeholder="Contraseña" class="border border-gray w-full rounded-md py-3 px-4">
                <button type="submit" class="transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 bg-blue-400 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-md">
                    Entrar
                </button>
            </div>
        </form>
    </div>
<?php
  require_once('../templates/footer.php');
?>