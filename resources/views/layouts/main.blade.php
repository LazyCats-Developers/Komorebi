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
                <a href="{{ route('login') }}" class="text-gray-100 text-3xl font-semibold hover:text-white">
                <i class="fas fa-user-cog mr-3"></i>{{ auth()->user()->nombre }}
                </a>
            </div>
            <!-- Body Dashboard -->
            <nav class="text-white text-base font-semibold pt-3">
                <a href="{{ url('sales') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-cash-register mr-3"></i>
                    Ventas
                </a>
                <a href="{{ url('shopping') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Compras
                </a>
                <a href="{{ url('inventory') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Inventario
                </a>
                <a href="{{ url('cashflow') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Finanzas
                </a>
                <a href="{{ url('modules') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Modulos
                </a>
            </nav>
        </aside>

    <!-- Mobile Dashboard -->
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Mobile Dashboard Header & Nav -->
        <header id="sidebarMobile" class="w-full py-5 px-6 sm:hidden">
            <!-- Mobile Dashboard Dropdown Nav -->
            <nav class="text-white text-base font-semibold">
                <a href="{{ route('login') }}" class="text-gray-100 text-3xl font-semibold hover:text-white">
                    <i class="fas fa-user-cog mr-3"></i>{{ auth()->user()->nombre }}
                </a>
                <a href="{{ url('sales') }}" class="block active-nav-link text-white py-4 pl-6">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Ventas
                </a>
                <a href="{{ url('shopping') }}" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-table mr-3"></i>
                    Compras
                </a>
                <a href="{{ url('inventory') }}" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6 ">
                    <i class="fas fa-align-left mr-3"></i>
                    Inventario
                </a>
                <a href="{{ url('cashflow') }}" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Finanzas
                </a>
                <a href="{{ url('modules') }}" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                    <i class="fas fa-calendar mr-3"></i>
                    Modulos
                </a>
            </nav>
        </header>

        <main class="w-full overflow-x-hidden">

            @if(in_array(request()->path(), ['main','sales','shopping','inventory','cashflow','modules']))

                @if(!auth()->user()->empresas()->exists())         
                    
                    <div class="grid-col">
                        <div class="flex justify-center bg-red-200 p-5 md:rounded-t-md">
                        <p>ATENCION</p>
                        </div>
                        <div class="flex justify-center bg-white p-5">
                        <p>No tienes ninguna empresa registrada aun, registra una empresa para poder usar los módulos.</p>
                        </div>

                        <div class="flex justify-center bg-white pb-5 px-5 md:rounded-b-md">
                        <a href="{{route('empresas.create')}}" class="flex justify-center w-full bg-blue-400 text-white font-semibold py-3 px-6 rounded-md hover:bg-green-600 md:w-80">
                            Crear empresa
                        </a>
                        </div>
                    </div>
                    
                @endif
                
            @endif

            @yield('content')
        </main>
    </div>
    <script src="../js/main.js"></script>
  </body>
</html>