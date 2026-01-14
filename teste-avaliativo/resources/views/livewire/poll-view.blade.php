<div class="max-w-xl mx-auto p-6 bg-slate-900 rounded-xl">
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-extrabold text-white">{{ $poll->title }}</h1>
        <p
            class="text-sm mt-3 px-4 py-1 inline-block rounded-full border 
            {{ $poll->isOpen() ? 'bg-green-900/30 text-green-400 border-green-800/50' : 'bg-rose-900/30 text-rose-400 border-rose-800/50' }}">
            {{ $poll->status }}
        </p>
        <p class="text-xs text-slate-500 mt-3 italic">
            Início: {{ $poll->start_date->format('d/m/Y H:i') }} | Término: {{ $poll->end_date->format('d/m/Y H:i') }}
        </p>
    </div>

    <div wire:poll.2s>
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class="mb-4 p-3 bg-emerald-600 text-white rounded-lg text-center animate-pulse shadow-lg shadow-emerald-900/20">
                {{ session('message') }}
            </div>
        @endif

        <div class="flex flex-col gap-4">
            @foreach ($options as $option)
                <div
                    class="flex justify-between items-center p-4 border-2 border-slate-800 bg-slate-800/40 rounded-xl transition-all hover:border-blue-500/50 hover:bg-slate-800">
                    <label class="flex items-center gap-3 cursor-pointer flex-1">
                        <input type="radio" wire:model="selectedOption" name="vote_option" value="{{ $option->id }}"
                            {{ !$poll->isOpen() ? 'disabled' : '' }} 
                            class="w-5 h-5 text-blue-500 bg-slate-700 border-slate-600 focus:ring-blue-600 focus:ring-offset-slate-900">
                        <span class="text-lg font-medium text-slate-200">{{ $option->description }}</span>
                    </label>

                    <span class="font-bold text-blue-400 bg-blue-900/30 border border-blue-800/50 px-3 py-1 rounded-lg min-w-[90px] text-center">
                        {{ $option->votes_count }} votos
                    </span>
                </div>
            @endforeach
        </div>

        @if ($poll->isOpen())
            <button wire:click="vote"
                class="mt-6 w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-900/20 transform active:scale-95 transition-all">
                Confirmar Voto
            </button>
        @elseif(now()->lt($poll->start_date))
            <div
                class="mt-6 p-4 bg-amber-900/20 border-l-4 border-amber-500 text-amber-200 text-center italic rounded-r-xl">
                A votação ainda não está aberta. Começa em {{ $poll->start_date->format('d/m/Y H:i') }}
            </div>
        @else
            <div class="mt-6 p-4 bg-slate-800 border-l-4 border-slate-600 text-slate-400 text-center italic rounded-r-xl">
                Votação encerrada em {{ $poll->end_date->format('d/m/Y H:i') }}
            </div>
        @endif
    </div>

    <div class="mt-8 text-center border-t border-slate-800 pt-4">
        <a href="{{ route('polls.index') }}" class="text-blue-400 hover:text-blue-300 font-medium transition flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Voltar para a listagem
        </a>
    </div>
</div>