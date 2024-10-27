<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="m-5">
        <div class="flex">
            <div class="w-1/3">
                <div class="">
                    <div class="bg-white border rounded-lg shadow p-8 mb-4">
                        <h1 class="text-3xl font-bold">Paper 01</h1>
                    </div>
                    {{-- <hr class="border border-gray-300 my-5">  --}}
                    <div class="bg-white border rounded-lg shadow p-8 mb-4 text-lg text-sky-500 flex items-center">
                        <i class="fa-regular fa-clock my-auto me-4 text-2xl"></i>
                        <span class="my-auto me-4">Sisa waktu:</span>
                        <span class="my-auto">20:15</span>
                    </div>
                    <div class="bg-white border rounded-lg shadow p-8 mb-4 grid grid-cols-5">
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border rounded-lg bg-sky-400 text-white">1</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">2</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">3</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">4</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">5</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">6</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">7</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">8</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">9</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">10</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">11</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">12</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">13</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">14</button>
                        </div>
                        <div class="px-2 py-4">
                            <button class="w-5/6 py-4 border border-gray-400 rounded-lg">15</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-2/3 ps-4">
                <div class="h-full bg-white border rounded-lg shadow">
                    <div class="p-8 flex justify-between items-center">
                        <button class="px-3 py-1 bg-sky-500 rounded text-white text-2xl">&laquo;</button>
                        <span class="my-auto">
                            <h5 class="text-xl font-semibold text-sky-500">Pertanyaan 1</h5>
                        </span>
                        <button class="px-3 py-1 bg-sky-500 rounded text-white text-2xl">&raquo;</button>
                        {{-- <a href="">&laquo; Sebelumnya</a> --}}
                    </div>
                    <hr>
                    <h3 class="text-2xl p-8">1. Apakah anda tahu apa yang saya maksud?</h3>
                    <div class="p-8">
                        <div class="flex gap-2 items-center mb-2">
                            <input type="radio" name="option" id={id} class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full"/>
                            <label htmlFor={id} class="ms-2 text-lg">A. Benar</label>
                        </div>
                        <div class="flex gap-2 items-center mb-2">
                            <input type="radio" name="option" id={id} class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full"/>
                            <label htmlFor={id} class="ms-2 text-lg">B. Salah</label>
                        </div>
                        <div class="flex gap-2 items-center mb-2">
                            <input type="radio" name="option" id={id} class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full"/>
                            <label htmlFor={id} class="ms-2 text-lg">C. Mungkin</label>
                        </div>
                        <div class="flex gap-2 items-center mb-2">
                            <input type="radio" name="option" id={id} class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full"/>
                            <label htmlFor={id} class="ms-2 text-lg">D. Bingung</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
