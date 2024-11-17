<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mt-10 mx-4">
        <div class="py-10 px-7 bg-white rounded-md shadow flex">
            <div class="w-2/6 py-5">
                <h1 class="text-4xl pb-5 font-bold">{{$tryout->name}}</h1>
                <p>
                    {!! $tryout->description !!}
                </p>
            </div>
            <hr class="border h-100">
            <div class="w-4/6"> 
                @foreach($categories as $item)
                    <div class="mb-5 border shadow rounded-lg overflow-hidden">
                        <h1 class="p-5 text-2xl font-semibold bg-gradient-to-tr from-sky-400 to-sky-500 text-white">{{$item->name}}</h1>
                        @foreach($item->sub_categories as $sub_item)
                        <div class="py-2 border-y px-5 flex" style="width: 100%;">
                            <div class="w-3/6">
                                <h3 class="font-medium text-lg">{{$sub_item->name}}</h3>
                                @if ($sub_item->duration)
                                    <span class="text-sky-500">
                                        <i class="fa-regular fa-clock"></i>
                                        <span class="me-2">{{$sub_item->duration}} Menit</span>
                                        {{-- <i class="fa-regular fa-file"></i> --}}
                                        {{-- <span></span> --}}
                                    </span>
                                @endif
                            </div>
                            <div class="w-3/6 px-5 flex align-middle justify-end text-sky-500 gap-4">
                                <a href="{{route('user.tryouts.paper', [$tryoutId, $sub_item->id])}}" class="flex items-center">
                                    <button class="p-3 px-4 flex items-center text-white bg-sky-500 rounded-lg font-semibold"><i class="fa-solid fa-circle-play"></i>&nbsp; Kerjakan</button>
                                </a>
                                @if ($sub_item->is_completed)
                                    <a href="{{ route('user.tryouts.history', [$tryoutId, $sub_item->id]) }}" class="flex items-center">
                                        <button class="p-3 px-4 flex items-center text-white bg-green-500 rounded-lg font-semibold">
                                            <i class="fa-solid fa-circle-check"></i>&nbsp; Riwayat
                                        </button>
                                    </a>
                                @endif
                                {{-- <i class="my-auto me-2 fa-solid fa-circle-check"></i> <span class="my-auto">Selesai</span> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
