<nav class="bg-white">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <button id="sidebarBtn" class="px-4 py-2 text-gray-700 text-2xl rounded-lg hover:bg-gray-200">
              <i class="fas fa-bars"></i>
            </button>
            <form method="GET" class="w-full invisible sm:visible">
              <div class="relative text-gray-500 ml-6 px-3 pt-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2 pt-1">
                  <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </button>
                </span>
                <input type="search" class="py-2 text-md text-gray-900 w-full
                rounded-md pl-10 bg-transparent placeholder-gray-800 focus:outline-none
                focus:bg-white focus:text-gray-800" placeholder="El busquedas">
              </div>
            </form>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

            <div class="ml-3 relative">
              <div>
                <button class="text-xl text-gray-800 px-4 py-2 focus:outline-none"
                id="notificationsBtn"><i class="far fa-bell"></i></button>
              </div>

              <div id="notificationsDiv" class="hidden origin-top-right absolute right-0 mt-2 w-64
              rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5
              focus:outline-none">
                <p class="p-2 text-sm text-gray-700">El sin notificaciones</p>
              </div>
            </div>

            <div class="ml-3 relative">
              <div>
                <button class="text-xl text-gray-800 pr-4 py-2 focus:outline-none"
                id="colorsBtn"><i class="fas fa-palette"></i></button>
              </div>

              <div id="colorsDiv" class="hidden origin-top-right absolute right-0  w-20
              rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5
              focus:outline-none z-10">
                <p class="p-2 text-sm text-gray-700">El Colores</p>
                <div class="py-2">
                  <button class="bg-blue-500 w-12 h-8 rounded block mx-auto my-1"
                    onclick="setColor('bg-blue-500')"></button>
                  <button class="bg-indigo-500 w-12 h-8 rounded block mx-auto my-1"
                    onclick="setColor('bg-indigo-500')"></button>
                  <button class="bg-green-500 w-12 h-8 rounded block mx-auto my-1"
                    onclick="setColor('bg-green-500')"></button>
                  <button class="bg-red-500 w-12 h-8 rounded block mx-auto my-1"
                    onclick="setColor('bg-red-500')"></button>
                  <button class="bg-gray-800 w-12 h-8 rounded block mx-auto my-1"
                    onclick="setColor('bg-gray-800')"></button>
                </div>
              </div>
            </div>

            <div class="ml-3 relative">
              <div>
                <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none
                focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="profileBtn">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="../../img/avatar.jpg" alt="">
                </button>
              </div>

              <div id="profileDiv" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700">
                  <i class="fas fa-user mr-2"></i>El Perfiles
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700">
                  <i class="fas fa-cog mr-2"></i>El configuraciones
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700">
                  <i class="fas fa-sign-out-alt mr-2"></i>El Salidas
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>