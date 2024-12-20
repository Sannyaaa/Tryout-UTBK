
@if (Auth::user())
  <nav class="absolute z-50 w-full">
    <div class="p-4">
        <div class="px-5 py-4 bg-white rounded-lg shadow border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
          <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
              @if (Auth::user())
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                  <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                
                <form action="#" method="GET" class="hidden lg:block">
                  <label for="topbar-search" class="sr-only">Search</label>
                  <div class="relative lg:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                  </div>
                </form>
              @else
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ Storage::url($component->navbar_image ?? '') }}" class="h-8" alt="Flowbite Logo" />
                    {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
                </a>
              @endif
            </div>
            <div class="flex items-center">
                <!-- Search mobile -->
                <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <span class="sr-only">Search</span>
                  <!-- Search icon -->
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </button>
                <!-- Notifications -->
                {{-- <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                  <span class="sr-only">View notifications</span>
                  <!-- Bell icon -->
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                </button> --}}
                <!-- Dropdown menu -->
                <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown">
                  <div class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      Notifications
                  </div>
                  <a href="#" class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                      <div class="inline-flex items-center ">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                        View all
                      </div>
                  </a>
                </div>

                @if (Auth::user())

                  <div class="font-semibold text-lg mt-1">
                    <span class="text-sky-500 bg-sky-50 px-3 py-2 rounded-md">
                      {{ Auth::user()->name }}
                    </span>
                  </div>
                  
                  
                  <!-- Profile -->
                  <div class="flex items-center mx-4">
                    <div>
                      <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar != null ? Storage::url(Auth::user()->avatar ?? '') : 'https://openclipart.org/image/2000px/247319' }}" alt="user photo">
                      </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-md dark:bg-gray-700 dark:divide-gray-600" id="dropdown-2">
                      <div class="px-4 py-3" role="none">
                        <p class="text-sm text-gray-900 capitalize dark:text-white" role="none">
                          {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                          {{ Auth::user()->email }}
                        </p>
                      </div>
                      <ul class="py-1" role="none">
                        <li>
                          <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                        </li>
                        <li>
                          <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                        </li>
                        <li class="py-2 mb-2 text-center">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span class="px-4 py-2 mx-2 rounded-lg font-semibold text-white bg-rose-600 hover:bg-rose-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                              <button type="submit" role="menuitem">Logout  </button>
                            </span>
                          </form>                 
                        </li>
                      </ul>
                    </div>
                  </div>

                  {{-- <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                  </button> --}}
                  
                  <div id="tooltip-toggle" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                      Toggle dark mode
                      <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
                @else
                  <div class="gap-3 flex">
                    <x-primary-link href="{{ route('login') }}" class="">
                      Login
                    </x-primary-link>
                    <x-secondary-link href="{{ route('register') }}" class="">
                      Register
                    </x-secondary-link>
                  </div>
                @endif
              </div>
          </div>
        </div>
    </div>
  </nav>
@else
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-6">
          <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="{{ Storage::url($component->navbar_image ?? '') }}" class="h-8" alt="Flowbite Logo" />
              {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
          </a>
          <div class="flex items-center lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
              
              @if (Auth::user())
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full lg:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                      <span class="sr-only">Open user menu</span>
                      <img class="w-8 h-8 rounded-full" src="{{ Storage::url(Auth::user()->avatar ?? '') }}" alt="user photo">
                  </button>
              @else
                  <div class="gap-3 flex">
                      <x-primary-link href="{{ route('login') }}" class="">
                      Login
                      </x-primary-link>
                  </div>
              @endif
              <!-- Dropdown menu -->
              <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                  <div class="px-4 py-3">
                      <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name ?? '' }}</span>
                      <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email ?? '' }}</span>
                  </div>
                  <ul class="py-2" aria-labelledby="user-menu-button">
                      <li>
                          <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                      </li>
                      <li>
                          <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                      </li>
                      <li>
                          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                      </li>
                  </ul>
              </div>
              
              <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
              </button>
          </div>
          <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-user">
              <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 mx-8 lg:space-x-4 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                      <a href="{{ route('home-page') }}" class="block text-white  px-4 rounded-lg py-2 {{ Route::is('home-page') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-800 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all " aria-current="page">Home</a>
                  </li>
                  <li>
                      <a href="{{ route('packages') }}" class="block  px-4 rounded-lg py-2 {{ Route::is('packages') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-700 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all ">Paket</a>
                  </li>
                  <li>
                      <a href="{{ route('mentor-page') }}" class="block  px-4 rounded-lg py-2 {{ Route::is('mentor-page') ? 'lg:bg-sky-50 text-white lg:text-sky-700 bg-sky-700 lg:dark:text-sky-500' : 'text-sky-700 hover:bg-gray-100 lg:hover:bg-sky-50 lg:hover:text-sky-700' }} dark:text-white lg:dark:hover:text-sky-500 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 transition-all">Mentor</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
@endif