<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="mt-10 mx-4">
        <div class="flex">
            <div class="w-1/3">
                <div class="">
                    <div class="bg-white border rounded-lg shadow p-8 mb-4">
                        <h1 class="text-3xl font-bold">{{$paper->name}}</h1>
                    </div>
                    {{-- <hr class="border border-gray-300 my-5">  --}}
                    <div class="bg-white border rounded-lg shadow p-8 mb-4 text-lg text-sky-500 flex items-center" wire:ignore>
                        <i class="fa-regular fa-clock my-auto me-4 text-2xl"></i>
                        <span class="my-auto me-4">Sisa waktu:</span>
                        <span id="timer" class="my-auto"></span> <!-- Timer Display -->
                    </div>
                    <div class="bg-white border rounded-lg shadow p-8 mb-4 grid grid-cols-5">
                        {{-- <input type="number" name="" wire:model.live="q" id="questionid"> --}}
                        @foreach ($questions as $item)
                            <div class="px-2 py-4">
                                <button wire:click="changeNumber({{$item->id}})" class="w-3/4 h-14 border rounded-lg
                                    {{ $q == $item->id ? 'bg-sky-400 text-white' : 'bg-gray-200' }}
                                ">
                                    {{$item->count}}
                                </button>
                            </div>
                        @endforeach
                        {{-- <div class="px-2 py-4">
                            <button class="w-3/4 h-14 border-4 border-sky-400 box-border rounded-lg text-sky-400 text-2xl font-bold" wire:click="submitAnswers()">
                                &raquo;
                            </button>
                        </div> --}}
                    </div>
                    <div class="bg-white border rounded-lg shadow p-8 mb-4">
                        <button class="w-full py-4 rounded-lg text-lg font-semibold text-white text-center bg-gradient-to-tr from-sky-400 to-sky-500" wire:click="submitAnswers()">
                            Selesai Tes
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-2/3 ps-4">
                <div class="h-full bg-white border rounded-lg shadow">
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
                                    {{-- wire:change="selectAnswer({{$option}})" --}}
                                    value="{{$option}}" 
                                    class="appearance-none w-6 h-6 me-2 border-2 border-blue-500 rounded-full" 
                                />
                                <label class="ms-2 text-lg">{{strtoupper($option)}}. {{$question->answer->$option}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}

    <div id="image-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full min-h-full max-w-full">
            <img data-modal-target="image-modal" data-modal-toggle="image-modal" src="{{Storage::url($question->image)}}" class="mb-2 mx-auto min-h-full">
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
                alert("Waktu habis!");
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

</script>
@endpush