<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mt-10">
        <h1 class="ms-5 text-lg font-semibold">Tryout Terbaru</h1>
        <div class="grid grid-cols-3">
            @php 
                
            @endphp
            <div class="m-5">
                <div class="border rounded-lg shadow">
                    <div class="px-4 py-2 rounded-t-lg bg-gradient-to-tr from-sky-400 to-sky-500">
                        <h4 class="font-bold text-white">SNBT 1</h4>
                    </div>
                    <div class="py-4 px-6 bg-white">
                        <div class="flex justify-between align-middle pb-4">
                            <h1 class="my-auto font-bold text-3xl w-fit">
                                Tryout UTBK 2024
                            </h1>
                            
                            <span class="my-auto text-lg font-bold text-sky-400">
                                <h6>Gratis</h6>
                            </span>
                        </div>
                        <div class="pe-6 pb-4">
                            <p>
                                lorem ipsum dolor sit amet consectetur adipiscing elit
                            </p>
                        </div>
                        <div class="border-2 rounded-lg border-sky-400 py-2 px-3 w-fit font-bold">
                            {{-- <span class="text-sky-400 border-e-2 border-sky-400 w-1/2 text-center"><i class="fa-solid fa-calendar"></i> 14 Juli 2024</span> --}}
                            {{-- <hr class="border border-sky-400"> --}}
                            <span class="text-sky-400"><i class="fa-solid fa-user-group"></i> 20 Peserta</span>
                        </div>
                    </div>
                    <hr>
                    <div class="py-4 px-6 bg-white rounded-b-lg">
                        <a href="{{route('user.tryouts.item', 1)}}" class="w-full">
                            <button class="text-white font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 hover:bg-sky-700 w-full p-3 rounded-lg">
                                Kerjakan
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @push('css') --}}