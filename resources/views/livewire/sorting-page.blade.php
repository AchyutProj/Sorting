<div class="text-center">
    <div class="text-4xl mb-4">
        Sorting Algorithms
    </div>
    <div class="flex flex-col gap-2">
        <div class="mb-3 w-full">
            <input type="text" wire:model="inputValue" class="w-full bg-slate-800 border-2 rounded-lg p-3 border-slate-700 @error('inputValue') border-red-500 @enderror"
                   placeholder="Enter letters or numbers to sort"/>
            @error('inputValue')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-row gap-4 justify-center">
            <button wire:click="bubbleSort" class="bg-white text-slate-800 rounded-lg px-8 py-3">
                Bubble Sort
            </button>
            <button wire:click="insertionSort" class="bg-white text-slate-800 rounded-lg px-8 py-3">
                Insertion Sort
            </button>
            <button wire:click="selectionSort" class="bg-white text-slate-800 rounded-lg px-8 py-3">
                Selection Sort
            </button>
            <button wire:click="mergeSort" class="bg-white text-slate-800 rounded-lg px-8 py-3">
                Merge Sort
            </button>
            <button wire:click="quickSort" class="bg-white text-slate-800 rounded-lg px-8 py-3">
                Quick Sort
            </button>
        </div>
        <span class="hidden text-red-500"></span>
        <span class="hidden text-green-500"></span>
    </div>
    @if(count($sortingSteps) > 0)
        <div class="mt-12 border-2 p-4">
            <div class="text-2xl">
                Sorted using {{ $currentAlgorithm }} in {{ count($sortingSteps) }} steps:
            </div>
            <div class="text-xs text-gray-500 mb-3">
                The character in <span class="text-red-500">red</span> is the current character being compared.
            </div>
            <div style="max-height: 400px; overflow: scroll;">
                @foreach($sortingSteps as $step)
                    <div class="flex flex-row gap-2 justify-center">
                        <div class="text-start">
                            <span class="text-gray-600">{{ $loop->iteration }}.</span> {!! $step !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
