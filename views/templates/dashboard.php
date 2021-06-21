<aside>
        <div class="p-6">
          <a href="" class="text-white text-3xl font-semibold hover:text-gray-300">
            <i class="fas fa-user-cog mr-3"></i>Usuario
          </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
              <i class="fas fa-tachometer-alt mr-3"></i>
              El Ventas
            </a>
            <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                El Compras
            </a>
            <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                El Cosas
            </a>
            <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                El Monedas
            </a>
            <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                El Modulos
            </a>
            <a href="" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                El Ayudas
            </a>
        </nav>
      </aside>

      <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header
        <header class="w-full flex items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="/images/logo.png">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header-->

        <!-- Mobile Header & Nav -->
        <header id="sidebarMobile" class="w-full py-5 px-6 sm:hidden">
            <!--div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div-->

            <!-- Dropdown Nav -->
            <nav class="text-white text-base font-semibold">
              <a href="" class="block active-nav-link text-white py-4 pl-6">
                <i class="fas fa-tachometer-alt mr-3"></i>
                El ventas
              </a>
              <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                  <i class="fas fa-table mr-3"></i>
                  El Compras
              </a>
              <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6 ">
                  <i class="fas fa-align-left mr-3"></i>
                  El Cosas
              </a>
              <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                  <i class="fas fa-tablet-alt mr-3"></i>
                  El Monedas
              </a>
              <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                  <i class="fas fa-calendar mr-3"></i>
                  El Modulos
              </a>
              <a href="" class="block text-white opacity-75 hover:opacity-100 py-4 pl-6">
                  <i class="fas fa-cogs mr-3"></i>
                  El Ayudas
              </a>
            </nav>
        </header>