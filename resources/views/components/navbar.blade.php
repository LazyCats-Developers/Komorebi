<nav class="bg-gray-800">
  <div class="mx-auto px-5">
    <div class="relative flex items-center justify-between h-16">
      <div class="flex-1 flex items-center justify-start sm:items-stretch">
        <button id="sidebarBtn" class="px-4 py-2 text-white text-2xl rounded-lg hover:bg-gray-500">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

        <div class="ml-3 relative">
          <div class="invisible">
            <button class="text-xl text-white px-4 py-2 focus:outline-none"
            id="notificationsBtn"><i class="far fa-bell"></i></button>
          </div>

          <div id="notificationsDiv" class="hidden origin-top-right absolute right-0 mt-2 w-64
          rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5
          focus:outline-none">
            <p class="p-2 text-sm text-gray-700">Not results...</p>
          </div>
        </div>

        <div class="ml-3 relative">
          <div>
            <button class="text-xl text-white pr-4 py-2 focus:outline-none"
            id="colorsBtn"><i class="fas fa-palette"></i></button>
          </div>

          <div id="colorsDiv" class="hidden origin-top-right absolute right-0  w-20
          rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5
          focus:outline-none z-10">
            <p class="p-2 text-sm text-gray-700">Colors:</p>
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
              <img class="h-8 w-8 rounded-full" src="../img/avatar.jpg" alt="">
            </button>
          </div>

          <div id="profileDiv" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
            <!-- Active: "bg-gray-100", Not Active: "" -->

            <form method="POST" action="{{ route('profile')}}">
                @csrf
                <button class="block px-4 py-2 text-sm text-gray-700">
                    <i class="fas fa-user mr-2"></i>Your Profile

                </button>
            </form>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700">
              <i class="fas fa-cog mr-2"></i>Settings
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="block px-4 py-2 text-sm text-gray-700">
                  <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
