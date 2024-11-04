

<aside id="sidebar" class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-80 p-4 h-full font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
  <div class="relative flex flex-col flex-1 min-h-0 py-0 mt-20 lg:mt-0 overflow-hidden bg-white border-r rounded-lg shadow border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
      <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        <ul class="pb-2 space-y-2">
          <li>
            <a href="#" class="flex justify-center my-3">
              <span class="self-center text-3xl font-semibold sm:text-4xl whitespace-nowrap dark:text-white bg-sky-50">Flowbite</span>
            </a>
          </li>

          <li>
            <form action="#" method="GET" class="lg:hidden">
              <label for="mobile-search" class="sr-only">Search</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
              </div>
            </form>
          </li>
          <li>
            {{-- <a href="#" class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                <span class="ml-3" sidebar-toggle-item>Dashboard</span>
            </a> --}}
            <x-sidebar-link link="{{ route('dashboard') }}" token="dashboard" name="Dashboard">
              <i class="fa-solid fa-tv"></i>
            </x-sidebar-link>
          </li>

          <li>
            <x-sidebar-link link="{{ route('admin.bimbel.index') }}" token="bimbel" name="Bimbel">
              <i class="fa-solid fa-book-open"></i>
            </x-sidebar-link>
          </li>

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="class-bimbel" name="Kelas Bimbel">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-solid fa-chalkboard-user"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.class-bimbel.index') }}" name="List" />
                        {{-- <a href="{{ route('admin.class-bimbel.index') }}" name="All Class</a> --}}
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.class-bimbel.create') }}" name="Buat" />
                        {{-- <a href="{{ route('admin.class-bimbel.create') }}" name="Buat</a> --}}
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>

          {{-- <li>
            <x-sidebar-link link="{{ route('admin.category.index') }}" name="Category Question">
              <i class="fa-solid fa-tv"></i>
            </x-sidebar-link>
          </li>

          <li>
            <x-sidebar-link link="{{ route('admin.sub_categories.index') }}" name="Sub Category Question">
              <i class="fa-solid fa-tv"></i>
            </x-sidebar-link>
          </li> --}}

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="category" name="Categori">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-regular fa-file-lines"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.category.index') }}" name="Categori" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.sub_categories.index') }}" name="Sub Categori" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="tryout" name="Tryout">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-regular fa-file-lines"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.tryout.index') }}" name="List" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.tryout.create') }}" name="Buat" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="question" name="Pertanyaan">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-solid fa-circle-question"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.question.index') }}" name="List" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.question.create') }}" name="Buat" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="package_member" name="Paket">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-solid fa-tags"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.package_member.index') }}" name="list" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.package_member.create') }}" name="Buat" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>
          
          <li>
            {{-- <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700" aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M.99 5.24A2.25 2.25 0 013.25 3h13.5A2.25 2.25 0 0119 5.25l.01 9.5A2.25 2.25 0 0116.76 17H3.26A2.267 2.267 0 011 14.74l-.01-9.5zm8.26 9.52v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.615c0 .414.336.75.75.75h5.373a.75.75 0 00.627-.74zm1.5 0a.75.75 0 00.627.74h5.373a.75.75 0 00.75-.75v-.615a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625zm6.75-3.63v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75v.625c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75zM17.5 7.5v-.625a.75.75 0 00-.75-.75H11.5a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75h5.25a.75.75 0 00.75-.75zm-8.25 0v-.625a.75.75 0 00-.75-.75H3.25a.75.75 0 00-.75.75V7.5c0 .414.336.75.75.75H8.5a.75.75 0 00.75-.75z"></path>
                </svg>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>CRUD</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-crud" class="space-y-2 py-2 hidden ">
              <li>
                <x-sidebar-link-dropdown link="#" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700  bg-gray-100 dark:bg-gray-700 ">Products" />
              </li>
              <li>
                <x-sidebar-link-dropdown link="#" class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 bg-gray-100 dark:bg-gray-700 ">Users" />
              </li>
            </ul> --}}

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="discount" name="Voucher Diskon">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-solid fa-ticket"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.discount.index') }}" name="List" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.discount.create') }}" name="Buat" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>

          <li>
            <!-- Dropdown Menu -->
            <x-sidebar-dropdown id="user" name="User">
                {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                <i class="fa-solid fa-users"></i>
                <x-slot name="content">
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.user.index') }}" name="List" />
                    </li>
                    <li>
                        <x-sidebar-link-dropdown link="{{ route('admin.user.create') }}" name="Buat" />
                    </li>
                </x-slot>
            </x-sidebar-dropdown>
          </li>
        </ul>
        <div class="pt-2 space-y-2">
          <x-sidebar-link link="{{ route('profile.edit') }}"  name="Profile">
            <i class="fa-solid fa-user"></i>
          </x-sidebar-link>
          <form method="POST" action="{{ route('logout') }}" class="">
            @csrf
            <span class="block p-2 font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
              <button type="submit" role="menuitem" class=""><i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Sign out</button>
            </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

