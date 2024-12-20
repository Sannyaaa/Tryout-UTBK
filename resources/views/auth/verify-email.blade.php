<x-guest-layout>
    <div class="bg-white rounded-lg shadow-lg max-w-xl mx-auto p-8">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            <h3 class="text-4xl font-bold text-sky-500 dark:text-white mb-2">
                Verifikasi Email!
            </h3>
            {{-- {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }} --}}
            {{ __('Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan email lainnya kepada Anda..') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm bg-green-50 p-4 rounded-md text-green-600 dark:text-green-400">
                {{ __('
    Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button class="">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
