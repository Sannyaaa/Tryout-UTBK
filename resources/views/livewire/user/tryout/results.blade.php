<div>
    <div class="">
    {{-- Header --}}
        {{-- <div class="bg-white border-b shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <h1 class="text-3xl font-bold text-gray-900">Hasil {{$result->tryout->name}}</h1>
            </div>
        </div> --}}

        <div class="max-w-7xl mx-auto px-4 py-8 mt-10">

            <div class=" relative mb-8">
                <div class="bg-gradient-to-tr from-sky-400 to-sky-500 rounded-lg shadow-lg py-4 px-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 text-sm font-semibold md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="#" class="inline-flex items-center text-gray-50 hover:text-sky-200 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $result->tryout->name }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">{{ $result->sub_category->name }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Hasil</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>

            <div class="space-y-6 lg:space-y-0 lg:flex gap-6">

                {{-- Main Content Area --}}
                <div class="w-full lg:w-2/3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        {{-- Question Navigation Header --}}
                        <div class="border-b border-gray-200">
                            <div class="p-6 flex items-center justify-between text-slate-50">
                                <button 
                                    wire:click="previousQuestion"
                                    {{ $this->isFirstQuestion() ? 'disabled' : '' }}
                                    class="p-2 px-3 rounded-lg flex items-center {{ !$this->isFirstQuestion() 
                                        ? 'bg-sky-400 hover:bg-sky-500' 
                                        : 'cursor-not-allowed' }}">
                                        sebelumnya
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>

                                <h2 class="text-lg font-semibold text-gray-900">
                                    Pertanyaan 
                                </h2>

                                <button 
                                    wire:click="nextQuestion"
                                    {{ $this->isLastQuestion() ? 'disabled' : '' }}
                                    class="p-2 px-3 rounded-lg flex items-center {{ !$this->isLastQuestion() 
                                        ? 'bg-sky-400 hover:bg-sky-500' 
                                        : 'cursor-not-allowed' }}">
                                        selanjutnya
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>


                        {{-- Question Content --}}
                        <div class="p-6 space-y-6">
                            @if($question->image)
                            <div class="rounded-lg overflow-hidden border border-gray-200">
                                <img src="{{Storage::url($question->image)}}" class="w-full h-auto max-h-96 object-contain bg-gray-50" alt="Question image">
                            </div>
                            @endif

                            <div class="prose max-w-none">
                                <h3 class="text-3xl font-bold text-slate-700">{!! $question->question !!}</h3>
                            </div>

                            {{-- Answer Options with Correct/Incorrect Indicators --}}
                            <div class="space-y-3">
                                @foreach(['a', 'b', 'c', 'd', 'e'] as $option)
                                <div class="relative flex items-start p-4 rounded-lg border 
                                    {{ $option === $question->correct_answer ? 'border-sky-200 bg-sky-50' : 
                                    ($userAnswers[$question->id] === $option && $option !== $question->correct_answer ? 'border-red-200 bg-red-50' : 
                                    'border-gray-200') }}">
                                    <div class="flex items-center h-5">
                                        <input type="radio" 
                                            disabled
                                            name="option{{$question->id}}" 
                                            {{ $userAnswers[$question->id] === $option ? 'checked' : '' }}
                                            class="h-4 w-4 {{ $option === $question->correct_answer ? 'text-sky-500' : 
                                                            ($userAnswers[$question->id] === $option ? 'text-red-500' : 'text-gray-300') }}"
                                        />
                                    </div>
                                    <div class="ml-4 flex items-center justify-between w-full">
                                        <span class="font-medium {{ $option === $question->correct_answer ? 'text-sky-700' : 
                                                                ($userAnswers[$question->id] === $option && $option !== $question->correct_answer ? 'text-red-700' : 
                                                                'text-gray-900') }}">
                                            {{strtoupper($option)}}. {{$question->answer->$option}}
                                        </span>
                                        @if($option === $question->correct_answer)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                            Jawaban Benar
                                        </span>
                                        @elseif($userAnswers[$question->id] === $option)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Jawaban Anda
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- Explanation if available --}}
                            @if($question->explanation)
                            <div class="mt-6 p-4 bg-sky-50 rounded-lg border border-sky-200">
                                <h4 class="text-lg font-semibold text-sky-900 mb-2">Pembahasan</h4>
                                <p class="text-sky-800">{!! $question->explanation !!}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Left Sidebar with Navigation and Summary --}}
                <div class="w-full lg:w-1/3 space-y-4">

                    {{-- Question Navigation --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Navigasi Soal</h2>
                        <div class="grid grid-cols-5 gap-2">
                            @foreach ($questions as $i => $item)
                                <button 
                                    wire:click="changeNumber({{ $item->id }})"
                                    wire:key="nav-{{ $item->id }}"
                                    type="button"
                                    class="w-full aspect-square flex items-center justify-center rounded-lg text-sm font-medium transition-all duration-200 max-w-20
                                    {{ $currentQuestionId == $item->id ? 'ring-2 ring-offset-2 ' : '' }}
                                    {{ isset($answeredQuestions[$item->id]) && $answeredQuestions[$item->id] === true 
                                        ? 'bg-sky-100 text-sky-700 hover:bg-sky-200 ' . ($currentQuestionId == $item->id ? 'ring-sky-300' : '') 
                                        : (isset($answeredQuestions[$item->id]) && $answeredQuestions[$item->id] === false 
                                            ? 'bg-red-100 text-red-700 hover:bg-red-200 ' . ($currentQuestionId == $item->id ? 'ring-red-300' : '') 
                                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200 ' . ($currentQuestionId == $item->id ? 'ring-gray-300' : '')) 
                                    }}">
                                    {{ $i + 1 }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Back Button --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <a href="{{ $result->tryout->is_together == 'together' ? route('user.tryouts.event.item', $result->tryout_id) : route('user.tryouts.item', $result->tryout_id) }}" 
                            class="w-full inline-flex items-center justify-center py-3 px-4 rounded-lg text-white font-medium transition-colors
                            bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700
                            focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <div class=" grid grid-cols-3 ">
                {{-- Score Summary Card --}}
                {{-- <div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 m-3">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Rincian Hasil Jawaban</h3>
                        <div class="text-center">
                            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-blue-50 mb-4">
                                <span class="text-3xl font-bold text-blue-600">{{ $result->score }}</span>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Skor Akhir</h2>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="p-3 bg-sky-50 rounded-lg">
                                    <div class="font-semibold text-sky-600">{{ $result->correct_answers }}</div>
                                    <div class="text-sky-600">Benar</div>
                                </div>
                                <div class="p-3 bg-red-50 rounded-lg">
                                    <div class="font-semibold text-red-600">{{ $result->incorrect_answers }}</div>
                                    <div class="text-red-600">Salah</div>
                                </div>
                                <div class="p-3 bg-gray-50 rounded-lg col-span-2">
                                    <div class="font-semibold text-gray-600">{{ $result->unanswered }}</div>
                                    <div class="text-gray-600">Tidak Dijawab</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- Score Summary Card --}}
                {{-- <div>
                    <div class="bg-white shadow rounded-lg p-6 m-3">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Perbandingan Dengan Rata-rata</h3>
                        {!! $chart->container() !!}
                        <div class="mt-4 max-h-40">
                            <p><strong>Nilai Rata-Rata:</strong> {{ $averageScore }}</p>
                            <p><strong>Nilai Anda:</strong> {{ $result->score }}</p>
                        </div>
                    </div>
                </div> --}}

                {{-- Score Summary Card --}}
                {{-- <div>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 m-3">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Urutan Hasil Tryout</h3>
                        <div class="p-3 bg-sky-50 rounded-lg text-sky-500 font-semibold text-center">
                            <div class="">Hasil Ini Berada di Urutan ke
                                <h2 class="font-extrabold text-6xl my-3">{{ $userRank }}</h2>
                            </div>
                            <div class="">Dari {{ $totalResult->count() }} Hasil.</div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- <div class="mt-10 mx-4">
        <div class="flex">

            Summary/Ringkasan hasil pengerjaan tryout
            <div class="w-1/3">
                <div class="">
                    <div class="bg-white border rounded-lg shadow p-8 mb-4">
                        <h1 class="text-3xl text-gray-700 font-bold">{{$result->tryout->name}}</h1>
                    </div>
                    <hr class="border border-gray-300 my-5"> 
                    @if ($paper->duration)
                        <div class="bg-white border rounded-lg shadow p-8 mb-4 text-lg text-sky-500 flex items-center" wire:ignore>
                            <i class="fa-regular fa-clock my-auto me-4 text-2xl"></i>
                            <span class="my-auto me-2">Sisa waktu:</span>
                            <span id="timer" class="my-auto"><i>Memulai timer...</i></span> <!-- Timer Display -->
                        </div>
                    @endif
                    <div class="bg-white border rounded-lg shadow p-8 mb-4 grid grid-cols-5">
                        <input type="number" name="" wire:model.live="q" id="questionid">
                        @foreach ($questions as $item)
                            <div class="px-2 py-4">
                                <button wire:click="changeNumber({{$item->id}})" class="w-3/4 h-14 border rounded-lg
                                    {{ $q == $item->id ? 'bg-sky-400 text-white' : 'bg-gray-200' }}
                                ">
                                    {{$item->count}}
                                </button>
                            </div>
                        @endforeach
                        <div class="px-2 py-4">
                            <button class="w-3/4 h-14 border-4 border-sky-400 box-border rounded-lg text-sky-400 text-2xl font-bold" wire:click="submitAnswers()">
                                &raquo;
                            </button>
                        </div>
                    </div>
                    <div class="bg-white border rounded-lg shadow p-8 mb-4">
                        <button class="w-full py-4 rounded-lg text-lg font-semibold text-white text-center bg-gradient-to-tr from-sky-400 to-sky-500" wire:click="submitAnswers()">
                            Selesai Tes
                        </button>
                    </div>
                </div>
            </div>
            
            Pembahasan Tryout
            <div class="w-2/3">
                <div class="bg-white border rounded-lg shadow p-8 mb-4 ms-2">
                    <h5 class="text-lg font-semibold text-gray-500">Pembahasan</h5>
                    <hr class="my-4">
                    <div>
                        <div class="p-8 flex justify-between items-center">
                            <div class="w-1/3 text-start">
        
                                @if (!$this->isFirstQuestion())
                                <button wire:click="previousQuestion" class="px-3 py-1 bg-sky-500 rounded text-white text-2xl">&laquo;</button>
                                @endif
        
                            </div>
                            <span class="w-1/3 my-auto">
                                <h5 class="text-xl font-semibold text-sky-500 text-center">Pertanyaan {{$question->count}}</h5>
                            </span>
                            <div class="w-1/3 text-end">
                                @if (!$this->isLastQuestion())
                                <button wire:click="nextQuestion" for="next" class="px-3 py-1 bg-sky-500 rounded text-white text-2xl">&raquo;</button>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="p-8">
                            <button>
                                <img data-modal-target="image-modal" data-modal-toggle="image-modal" src="{{$question->image ?? ''}}" class="mb-2" style="max-height: 36rem;">
                            </button>
                            <h3 class="text-2xl">{!! $question->question !!}</h3>
                        </div>
                        <div class="p-8" wire:poll>
                            @foreach(['a', 'b', 'c', 'd', 'e'] as $option)
                                <div class="flex gap-2 items-center mb-2">
                                    <input type="radio" 
                                        name="option{{$question->id}}" 
                                        wire:key="question-{{ $question->id }}-option-{{ $option }}"
                                        wire:model="answers.{{$question->id}}" 
                                        value="{{$option}}" 
                                        disabled
                                        class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full" 
                                    />
                                    <label class="ms-2 text-lg">{{strtoupper($option)}}. {{$question->answer->$option}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="px-2 py-4 text-lg border-4 border-sky-400 rounded-lg">
                            <h3 class="mx-2 text-sky-500 font-semibold">Jawaban yang benar: <span class="font-bold">{{strtoupper($question->correct_answer)}}</span></h3>
                            <hr class="my-4 border">
                            <h3 class="mx-2 pb-2 text-xl font-medium">Pembahasan:</h3>
                            <p class="mx-2 text-lg">{!! $question->explanation !!}</p>
                        </div>
                    </div>
                </div>
                 <div class="h-full bg-white border rounded-lg shadow">
                </div> 
            </div>
            <div class="w-1/3">
                <div class="bg-white border rounded-lg shadow p-8 mb-4 me-2">
                    <h5 class="text-lg font-semibold text-gray-500">Hasil pengerjaan tryout</h5>
                    <hr class="my-4">
                    <h1 class="font-bold text-4xl">Paper Tryout 1</h1>
                    <div class="my-4">
                        <span>dikerjakan oleh</span>
                        <span class="font-medium">{{Auth::user()->name}}</span>
                    </div>
                    <div class="flex">
                        <div class="w-full py-6 text-center">
                            <h1 class="text-6xl font-bold">
                                {{$results->score}}
                            </h1>
                            <h3 class="text-xl font-medium text-gray-500 ">Nilai anda</h3>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div wire:ignore>
                        <canvas id="donut"></canvas>
                    </div>
                    <hr class="my-6">
                    <div>
                        <table class="table-fixed w-full border-separate border-spacing-y-2">
                            <tbody>
                                <tr>
                                    <th class="text-start font-normal">Total Pertanyaan</th>
                                    <th class="text-end font-bold text-lg"></th>
                                </tr>
                                <tr>
                                    <th class="text-start font-normal">Pertanyaan Dijawab</th>
                                    <th class="text-end font-bold text-lg ">{{$totalAnswered = $results->correct_answers + $results->incorrect_answers}}</th>
                                </tr>
                                <tr>
                                    <th class="text-start font-normal">Jawaban Benar</th>
                                    <th class="text-end font-bold text-lg text-sky-500">{{$results->correct_answers}}</th>
                                </tr>
                                <tr>
                                    <th class="text-start font-normal">Jawaban Salah</th>
                                    <th class="text-end font-bold text-lg text-rose-600">{{$results->incorrect_answers}}</th>
                                </tr>
                                <tr>
                                    <th class="text-start font-normal">Tidak dijawab</th>
                                    <th class="text-end font-bold text-lg text-gray-500">{{$totalQuestions - $totalAnswered}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
</div>

@push('head-styles')
@endpush

@push('body-scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
 --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('donut').getContext('2d');
    
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    'Jawaban Benar',
                    'Jawaban Salah',
                    'Tidak Dijawab'
                ],
                datasets: [{
                    label: 'Nilai',
                    data: [{{$results->correct_answers}}, {{$results->incorrect_answers}}, {{$totalQuestions - $totalAnswered}}],
                    backgroundColor: [
                    'rgb(56 189 248)',
                    'rgb(244 63 94)',
                    'rgb(156 163 175)'
                    ],
                    hoverOffset: 14
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    });
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{!! $chart->script() !!}


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('livewire:load', function() {
        // Get average score for comparison
        // @php
        //     $avgScore = \App\Models\Result::where('tryout_id', $result->tryout_id)
        //         ->where('sub_category_id', $result->sub_category_id)
        //         ->avg(\DB::raw('(correct_answers * 100.0) / ' . $questions->count()));
            
        //     $userScore = ($result->correct_answers / $questions->count()) * 100;
        // @endphp

        const ctx = document.getElementById('chartData').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Skor Anda', 'Rata-rata'],
                datasets: [{
                    data: [{{ $result->score }}, {{ $averageScore }}],
                    backgroundColor: ['#2563eb', '#9333ea'],
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + '%'
                            }
                        }
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('questionChanged', function (data) {
            // Update UI jika diperlukan
            console.log('Question changed to:', data.count);
        });
    });
</script>

@endpush