<div>
    <div class=" ">
        {{-- Header with exam name --}}
        {{-- <div class="bg-white border-b shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <h1 class="text-3xl font-bold text-gray-900">{{$paper->name}}</h1>
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
                                <a href="#" class="ml-1 text-gray-50 hover:text-sky-200 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $tryout->name }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">{{ $paper->name }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-50" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-1 text-gray-50 md:ml-2 dark:text-gray-500" aria-current="page">Soal</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    {{-- <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Bimbels</h1> --}}
                </div>
            </div>

            <div class=" lg:flex gap-6">

                {{-- Main Content Area --}}
                <div class="w-2/3">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        {{-- Question Navigation Header --}}
                        <div class="border-b border-gray-200">
                            <div class="p-6 flex items-center justify-between text-slate-50">
                                <button 
                                    {{ !$this->isFirstQuestion() ? '' : 'disabled' }}
                                    wire:click="previousQuestion"
                                    class="p-2 pe-3 rounded-lg flex items-center {{ !$this->isFirstQuestion() 
                                        ? ' bg-sky-400 hover:bg-sky-500' 
                                        : ' cursor-not-allowed' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    sebelumnya
                                </button>

                                <h2 class="text-lg font-semibold text-gray-800">
                                    Pertanyaan {{ $questions->firstWhere('id', $q)->count }}
                                </h2>

                                <button 
                                    {{ !$this->isLastQuestion() ? '' : 'disabled' }}
                                    wire:click="nextQuestion"
                                    class="p-2 ps-3 rounded-lg flex items-center {{ !$this->isLastQuestion() 
                                        ? ' bg-sky-400 hover:bg-sky-500' 
                                        : ' cursor-not-allowed' }}">
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
                                    <button class="w-full" data-modal-target="image-modal" data-modal-toggle="image-modal">
                                        <img src="{{Storage::url($question->image)}}" class="w-full h-auto max-h-96 object-contain bg-gray-50" alt="Question image">
                                    </button>
                                </div>
                            @endif

                            <div class="prose max-w-none">
                                <h3 class="text-3xl font-bold text-gray-900">{{ $question->question }}</h3>
                            </div>

                            {{-- Answer Options --}}
                            <div class="space-y-3" wire:poll>
                                @foreach(['a', 'b', 'c', 'd', 'e'] as $option)
                                <label class="relative flex items-start p-4 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer group">
                                    <div class="flex items-center h-5">
                                        <input type="radio" 
                                            name="option{{$question->id}}" 
                                            wire:key="question-{{ $question->id }}-option-{{ $option }}"
                                            wire:model="answers.{{$question->id}}" 
                                            value="{{$option}}" 
                                            class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-blue-500"
                                        />
                                    </div>
                                    <div class="ml-4 flex items-center">
                                        <span class="font-medium text-gray-900 group-hover:text-blue-600">
                                            {{strtoupper($option)}}. {{$question->answer->$option}}
                                        </span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Left Sidebar with Navigation --}}
                <div class="w-1/3">
                    <div class="space-y-4">
                        {{-- Timer Card --}}
                        @if ($paper->duration)
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 bg-blue-50 rounded-lg">
                                    <i class="fa-regular fa-clock text-blue-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Sisa waktu:</p>
                                    <div id="timer" class="text-2xl font-semibold text-blue-600">
                                        <i>Memulai timer...</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Question Navigation --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Navigasi Soal</h2>
                            <div class="grid grid-cols-5 gap-2">
                                @foreach ($questions as $item)
                                    <div>
                                        <button wire:click="changeNumber({{$item->id}})" 
                                            class="w-full aspect-square flex items-center justify-center rounded-lg text-sm font-medium transition-all duration-200
                                            {{ $q == $item->id 
                                                ? 'bg-sky-500 text-white shadow-md ring-2 ring-sky-300 ring-offset-2' 
                                                : (isset($answers[$item->id]) 
                                                    ? 'bg-sky-100 text-sky-700 hover:bg-sky-200' 
                                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200') 
                                            }}">
                                            {{$item->count}}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                            <button class="w-full py-3 px-4 rounded-lg text-white font-medium transition-colors
                                bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700
                                focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                wire:click="submitAnswers()">
                                Selesai Tes
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Image Modal --}}
    <div id="image-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl">
            <div class="relative bg-white rounded-lg shadow">
                <div class="flex items-center justify-between p-4 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Gambar Soal
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="image-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <img src="{{$question->image}}" class="w-full h-auto" alt="Question image">
                </div>
            </div>
        </div>
    </div>
</div>

@push('head-styles')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.css" integrity="sha512-eG8C/4QWvW9MQKJNw2Xzr0KW7IcfBSxljko82RuSs613uOAg/jHEeuez4dfFgto1u6SRI/nXmTr9YPCjs1ozBg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush

@push('body-scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.6/viewer.min.js" integrity="sha512-EC3CQ+2OkM+ZKsM1dbFAB6OGEPKRxi6EDRnZW9ys8LghQRAq6cXPUgXCCujmDrXdodGXX9bqaaCRtwj4h4wgSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script>
    const viewer = new Viewer(document.getElementById('image'), {
        inline: true,
        viewed() {
            viewer.zoomTo(1);
        },
    });

    const gallery = new Viewer(document.getElementById('images'));
</script> --}}
{{-- <script>
    document.getElementById('previous').onclick = function() {
        document.getElementById('question{!!$question->id!!}').checked = true;
    };
</script> --}}

{{-- <script>
    Livewire.on('refresh', () => {
        // Refresh the component
        Livewire.emit('refresh');
    });
</script> --}}

<script>
    // Function to change the input value based on the button clicked
    function changeValue(button) {
        // Get the number input element
        const numberInput = document.getElementById('questionid');

        // Get the new value from the button's data attribute
        const newValue = button.getAttribute('data-new-value');

        // Set the number input's value to the new value
        numberInput.value = newValue;

        // Display the new value
        // const resultElement = document.getElementById('result');
        // resultElement.textContent = 'New value: ' + numberInput.value;
    }

    // @foreach($questions as $item)

    // Attach event listeners to buttons
    document.getElementById('question{!!$item->id!!}').onclick = function() {
        changeValue(this);
    };
    
    // @endforeach

</script>
@if ($paper->duration)
<script>
    let timerStarted = false; // Flag to check if the timer has started
    let duration = {{$paper->duration * 60}}; // Set the timer duration in seconds
    let remainingTime = duration; // Initialize remaining time

    function startTimer() {
        if (timerStarted) return; // Prevent multiple timers
        timerStarted = true; // Set the flag to true

        const display = document.getElementById('timer');

        const interval = setInterval(function () {
            if (remainingTime <= 0) {
                clearInterval(interval);
                display.textContent = "00:00"; // Stop at 0
                // alert("Waktu habis!");
                submitAnswers(); // Call the submit function
                return; // Exit if time is up
            }

            let minutes = parseInt(remainingTime / 60, 10);
            let seconds = parseInt(remainingTime % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            remainingTime--; // Decrement the remaining time
        }, 1000);
    }

    // Start the timer on window load
    window.onload = function () {
        startTimer();
    };

    // Listen for Livewire updates
    Livewire.on('refresh', () => {
        // If the timer is already started, do not start again
        if (!timerStarted) {
            startTimer();
        }
    });

    function submitAnswers() {
        // Trigger the submitAnswers function in Livewire
        @this.submitAnswers();
    }

</script>
@endif
@endpush