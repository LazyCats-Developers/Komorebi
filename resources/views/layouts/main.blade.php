<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <title>Komorebi</title>
</head>
<body>
@include('components.navbar')
<div class="flex bg-gray-300">
    <aside>
        <!-- Header Dashboard -->
        <div class="p-5">
            <a href="{{ route('login') }}" class="text-gray-100 text-xl">
                <p><i class="fas fa-house-user mr-3"></i>{{ auth()->user()->nombre }}</p>
            </a>
        </div>
        <!-- Body Dashboard -->
        <nav class="flex flex-col space-y-3 p-5">
            @if(auth()->user()->empresas()->exists())
                <a href="{{ url('sales') }}" class="active-nav-link nav-item">
                    <div class="text-gray-100 rounded-full px-6 py-3 hover:text-black hover:bg-gray-100">
                        <p><i class="fas fa-cash-register mr-3"></i>Ventas</p>
                    </div>
                </a>
                <a href="{{ url('shopping') }}" class="active-nav-link nav-item">
                    <div class="text-gray-100 rounded-full px-6 py-3 hover:text-black hover:bg-gray-100">
                        <p><i class="fas fa-truck mr-3"></i></i>Compras</p>
                    </div>
                </a>
                <a href="{{ url('inventory') }}" class="active-nav-link nav-item">
                    <div class="text-gray-100 rounded-full px-6 py-3 hover:text-black hover:bg-gray-100">
                        <p><i class="fas fa-clipboard-list mr-3"></i>Inventario</p>
                    </div>
                </a>
                <a href="{{ url('cashflow') }}" class="active-nav-link nav-item">
                    <div class="text-gray-100 rounded-full px-6 py-3 hover:text-black hover:bg-gray-100">
                        <p><i class="fas fa-chart-line mr-3"></i>Finanzas</p>
                    </div>
                </a>
                <a href="{{ url('modules') }}" class="active-nav-link nav-item">
                    <div class="text-gray-100 rounded-full px-6 py-3 hover:text-black hover:bg-gray-100">
                        <p><i class="fas fa-plus-square mr-3"></i>Modulos</p>
                    </div>
                </a>
            @endif
        </nav>
    </aside>

    <!-- Mobile Dashboard -->
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Mobile Dashboard Header & Nav -->
        <header id="sidebarMobile" class="w-full py-3 px-6 sm:hidden">
            <!-- Mobile Dashboard Dropdown Nav -->
            <nav class="flex flex-col">
                <a href="{{ route('login') }}" class="text-gray-100 text-3xl">
                    <i class="fas fa-house-user mr-3"></i>{{ auth()->user()->nombre }}
                </a>
                @if(auth()->user()->empresas()->exists())
                    <a href="{{ url('sales') }}" class="active-nav-link nav-item">
                        <div class="text-gray-100 rounded-md p-4 hover:text-black hover:bg-gray-100">
                            <p><i class="fas fa-cash-register mr-3"></i>Ventas</p>
                        </div>
                    </a>
                    <a href="{{ url('shopping') }}" class="active-nav-link nav-item">
                        <div class="text-gray-100 rounded-md p-4 hover:text-black hover:bg-gray-100">
                            <p><i class="fas fa-truck mr-3"></i></i>Compras</p>
                        </div>
                    </a>
                    <a href="{{ url('inventory') }}" class="active-nav-link nav-item">
                        <div class="text-gray-100 rounded-md p-4 hover:text-black hover:bg-gray-100">
                            <p><i class="fas fa-clipboard-list mr-3"></i>Inventario</p>
                        </div>
                    </a>
                    <a href="{{ url('cashflow') }}" class="active-nav-link nav-item">
                        <div class="text-gray-100 rounded-md p-4 hover:text-black hover:bg-gray-100">
                            <p><i class="fas fa-chart-line mr-3"></i>Finanzas</p>
                        </div>
                    </a>
                    <a href="{{ url('modules') }}" class="active-nav-link nav-item">
                        <div class="text-gray-100 rounded-md p-4 hover:text-black hover:bg-gray-100">
                            <p><i class="fas fa-plus-square mr-3"></i>Modulos</p>
                        </div>
                    </a>
                @endif
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

            @if(session('status'))
                <div >
                    {{ session('status')['message'] }}
                </div>
            @endif

            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
