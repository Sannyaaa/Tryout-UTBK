<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="mt-10 mx-4">
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
                    <div class="p-8">
                        <button>
                            <img data-modal-target="image-modal" data-modal-toggle="image-modal" src="https://images.unsplash.com/photo-1705488420842-efc45a507d72?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="mb-2" style="max-height: 36rem;">
                        </button>
                        <h3 class="text-2xl">Apakah anda tahu apa yang saya maksud?</h3>
                    </div>
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

    {{-- Modal --}}

    <div id="image-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-full">
            <img data-modal-target="image-modal" data-modal-toggle="image-modal" src="https://images.unsplash.com/photo-1705488420842-efc45a507d72?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="mb-2">
        </div>
    </div>
</div>

@push('head-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.css" integrity="sha512-eG8C/4QWvW9MQKJNw2Xzr0KW7IcfBSxljko82RuSs613uOAg/jHEeuez4dfFgto1u6SRI/nXmTr9YPCjs1ozBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('body-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.js" integrity="sha512-EC3CQ+2OkM+ZKsM1dbFAB6OGEPKRxi6EDRnZW9ys8LghQRAq6cXPUgXCCujmDrXdodGXX9bqaaCRtwj4h4wgSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const viewer = new Viewer(document.getElementById('image'), {
        inline: true,
        viewed() {
            viewer.zoomTo(1);
        },
    });

    const gallery = new Viewer(document.getElementById('images'));
</script>
@endpush