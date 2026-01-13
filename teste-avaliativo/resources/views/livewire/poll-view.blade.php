<div class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-xl mt-10">
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-extrabold text-gray-800">{{ $poll->title }}</h1>
        <p
            class="text-sm mt-2 px-3 py-1 inline-block rounded-full 
            {{ $poll->isOpen() ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ $poll->status }}
        </p>
        <p class="text-xs text-gray-400 mt-2 italic">
            Início: {{ $poll->start_date->format('d/m/Y H:i') }} | Término: {{ $poll->end_date->format('d/m/Y H:i') }}
        </p>
    </div>

    <div wire:poll.2s>
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class="mb-4 p-3 bg-green-500 text-white rounded-lg text-center animate-pulse">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex flex-col gap-4">
            @foreach ($options as $option)
                <div
                    class="flex justify-between items-center p-4 border-2 rounded-xl transition-all hover:border-blue-300">
                    <label class="flex items-center gap-3 cursor-pointer flex-1">
                        <input type="radio" wire:model="selectedOption" name="vote_option" value="{{ $option->id }}"
                            {{ !$poll->isOpen() ? 'disabled' : '' }} class="w-5 h-5 text-blue-600">
                        <span class="text-lg font-medium text-gray-700">{{ $option->description }}</span>
                    </label>

                    <span class="font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg min-w-[90px] text-center">
                        {{ $option->votes_count }} votos
                    </span>
                </div>
            @endforeach
        </div>

        @if ($poll->isOpen())
            <button wire:click="vote"
                class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl shadow-lg transform active:scale-95 transition">
                Confirmar Voto
            </button>
        @elseif(now()->lt($poll->start_date))
            <div
                class="mt-6 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 text-center italic rounded-r-xl">
                A votação ainda não está aberta. Começa em {{ $poll->start_date->format('d/m/Y H:i') }}
            </div>
        @else
            <div class="mt-6 p-4 bg-gray-100 border-l-4 border-gray-400 text-gray-600 text-center italic">
                Votação encerrada em {{ $poll->end_date->format('d/m/Y H:i') }}
            </div>
        @endif
    </div>

    <div class="mt-8 text-center border-t pt-4">
        <a href="{{ route('polls.index') }}" class="text-blue-500 hover:text-blue-700 font-medium">
            ← Voltar para a listagem
        </a>
    </div>
</div>
