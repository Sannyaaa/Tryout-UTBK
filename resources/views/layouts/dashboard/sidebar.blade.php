

<aside id="sidebar" class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-80 p-4 h-full font-normal duration-75 lg:flex transition-width" aria-label="Sidebar">
  <div class="relative flex flex-col flex-1 min-h-0 py-0 mt-20 lg:mt-0 overflow-hidden bg-white border-r rounded-lg shadow border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto sidebar-content">
      <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        <ul class="pb-2 space-y-2">
          <li>
            <a href="#" class="flex justify-center py-4 bg-sky-50 rounded-lg">
              <img src="{{ Storage::url($component->navbar_image ?? '') }}" class="h-8" alt="Flowbite Logo" />
              {{-- <span class="self-center text-3xl font-semibold sm:text-4xl whitespace-nowrap text-sky-800 dark:text-white bg-sky-50">Flowbite</span> --}}
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
          @if (Gate::allows('mentor'))
            <li>
              <x-sidebar-link link="{{ route('dashboard-mentor') }}" token="dashboard-mentor" name="Dashboard">
                <i class="fa-solid fa-display"></i>
              </x-sidebar-link>
            </li>
          @endif

          @if (Gate::allows('admin'))

            <li>
              <x-sidebar-link link="{{ route('dashboard') }}" token="dashboard-proccess" name="Dashboard">
                <i class="fa-solid fa-display"></i>
              </x-sidebar-link>
            </li>

            <li>
              <!-- Dropdown Menu -->
              <x-sidebar-dropdown id="bimbel" name="Bimbel" :isActive="Str::startsWith(request()->url(), [
                  route('admin.bimbel.index'), 
                  route('admin.class-bimbel.index'),
                  route('admin.question-practice.index')
              ])">
                  {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                  <i class="fa-solid fa-book-open-reader"></i>
                  <x-slot name="content">
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.bimbel.index') }}" name="Daftar Bimbel" />
                      </li>
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.class-bimbel.index') }}" name="Kelas Bimbel" />
                      </li>
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.question-practice.index') }}" name="Pertanyaan Latihan" />
                      </li>
                  </x-slot>
              </x-sidebar-dropdown>
            </li>

            <li>
              <!-- Dropdown Menu -->
              <x-sidebar-dropdown id="tryout" name="Tryout" :isActive="Str::startsWith(request()->url(), [
                  route('admin.tryout.index'), 
                  route('admin.question.index'),
              ])">
                  {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                  <i class="fa-regular fa-file-lines"></i>
                  <x-slot name="content">
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.tryout.index') }}" name="Daftar Tryout" />
                      </li>
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.question.index') }}" name="Daftar Pertanyaan" />
                      </li>
                  </x-slot>
              </x-sidebar-dropdown>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.package_member.index') }}" token="package_member" name="Paket">
                <i class="fa-solid fa-tags"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.discount.index') }}" token="discount" name="Voucher Discount">
                <i class="fa-solid fa-ticket"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.promotion.index') }}" token="promotion" name="Banner">
                <i class="fa-solid fa-images"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.order.index') }}" token="order" name="Transaksi">
                <i class="fa-solid fa-money-bill-transfer"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.report.index') }}" token="report" name="Laporan keuangan">
                <i class="fa-solid fa-flag"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.testimonial.index') }}" token="testimonial" name="Testimonial">
                <i class="fa-solid fa-comments"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.user.index') }}" token="user" name="User">
                <i class="fa-solid fa-users"></i>
              </x-sidebar-link>
            </li>

            <li>
              <!-- Dropdown Menu -->
              <x-sidebar-dropdown id="page" name="Pengaturan Halaman" :isActive="Str::startsWith(request()->url(), [
                  route('admin.home-page'), 
                  route('admin.component-page'),
              ])">
                  {{-- <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path> --}}
                  <i class="fa-solid fa-file-signature"></i>
                  <x-slot name="content">
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.home-page') }}" name="Halaman Home" />
                      </li>
                      <li>
                          <x-sidebar-link-dropdown link="{{ route('admin.component-page') }}" name="Komponen" />
                      </li>
                  </x-slot>
              </x-sidebar-dropdown>
            </li>

            <li>
              <x-sidebar-link link="{{ route('admin.combined-categories.index') }}" token="combined-categories" name="Materi">
                <i class="fa-solid fa-book-open"></i>
              </x-sidebar-link>
            </li>

          @elseif (Gate::allows('mentor'))
            
            <li>
              <x-sidebar-link link="{{ route('mentor.bimbel.index') }}" token="bimbel" name="Bimbel">
                <i class="fa-solid fa-book-open"></i>
              </x-sidebar-link>
            </li>

            <li>
              <x-sidebar-link link="{{ route('mentor.class-bimbel.index') }}" token="class-bimbel" name="Kelas Bimbel">
                <i class="fa-solid fa-book-open"></i>
              </x-sidebar-link>
            </li>

          @endif
        </ul>
        <div class="pt-2 space-y-2">
          @if (Gate::allows('admin'))
            <x-sidebar-link link="{{ route('admin.profile.edit') }}" token="profile" name="Profile">
            <i class="fa-solid fa-user"></i>
          </x-sidebar-link>
          @elseif (Gate::allows('mentor'))
            <x-sidebar-link link="{{ route('mentor.profile.edit') }}" token="profile" name="Profile">
              <i class="fa-solid fa-user"></i>
            </x-sidebar-link>
          @endif
          <form method="POST" action="{{ route('logout') }}" class="">
            @csrf
            <button type="submit" class="block py-2 px-4 font-medium text-slate-50 bg-rose-500 hover:bg-rose-600 rounded-lg dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
              <span role="menuitem" class=""><i class="fa-solid fa-arrow-right-from-bracket me-1"></i> Logout </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>

