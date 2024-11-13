<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    {{-- Quiz Attendant Informations --}}

    {{-- Total Questions --}}
    {{-- Answered Questions --}}
    {{-- Correct-Wrong-Null --}}
    {{-- Score% --}}
    {{-- Time remaining --}}

    {{-- So like huge donut chart with the % in the middle of it --}}

    <div class="mt-10 mx-4">
        <div class="flex">

            {{-- Summary/Ringkasan hasil pengerjaan tryout --}}

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
                        {{-- <div class="w-1/2 py-6 border-s text-center">
                            <h1 class="text-6xl font-bold">
                                32:10
                            </h1>
                            <h3 class="text-xl font-medium text-gray-500 ">Waktu ditempuh</h3>
                        </div> --}}
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

            {{-- Pembahasan Tryout --}}

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
                            <h3 class="text-2xl">{{ $question->question }}</h3>
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
                                    <label class="ms-2 text-lg">{{strtoupper($option)}}. {{$question->answer_practice->$option}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="px-2 py-4 text-lg border-4 border-sky-400 rounded-lg">
                            <h3 class="mx-2 text-sky-500 font-semibold">Jawaban yang benar: <span class="font-bold">{{strtoupper($question->correct_answer)}}</span></h3>
                            <hr class="my-4 border">
                            <h3 class="mx-2 pb-2 text-xl font-medium">Pembahasan:</h3>
                            <p class="mx-2 text-lg">{{$question->explanation}}</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="h-full bg-white border rounded-lg shadow">
                </div> --}}
            </div>
        </div>
    </div>
</div>

@push('head-styles')
@endpush

@push('body-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
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
</script>

@endpush