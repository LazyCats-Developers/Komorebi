<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <title>Komorebi</title>
</head>
<body>
    @include('components.navbar')
    <div class="flex bg-gray-200">

        <aside>
            <!-- Header Dashboard -->
            <div class="p-6">
                <a href="" class="text-gray-100 text-3xl font-semibold hover:text-white">
                <i class="fas fa-user-cog mr-3"></i>{{ auth()->user()->nombre }}
                </a>
            </div>
            <!-- Body Dashboard -->
            <nav class="text-white text-base font-semibold pt-3">
                <a href="" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Ventas
                </a>
                <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Compras
                </a>
                <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Inventario
                </a>
                <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Finanzas
                </a>
                <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Modulos
                </a>
                <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Soporte
                </a>
            </nav>
        </aside>

    <!-- Mobile Dashboard -->
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Mobile Dashboard Header & Nav -->
        <header id="sidebarMobile" class="w-full py-5 px-6 sm:hidden">
            <!-- Mobile Dashboard Dropdown Nav -->
            <nav class="text-white text-base font-semibold">
                <a href="" class="block active-nav-link text-white py-4 pl-6">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Ventas
                </a>
                <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-table mr-3"></i>
                    Compras
                </a>
                <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6 ">
                    <i class="fas fa-align-left mr-3"></i>
                    Inventario
                </a>
                <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Finanzas
                </a>
                <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-calendar mr-3"></i>
                    Modulos
                </a>
                <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-cogs mr-3"></i>
                    Soporte
                </a>
            </nav>
        </header>

        <main class="w-full overflow-x-hidden">
            @yield('content')
        </main>
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>