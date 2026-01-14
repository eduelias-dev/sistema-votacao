<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes - Sistema de Votação</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 font-sans antialiased min-h-screen text-slate-200">

    <nav class="bg-slate-900 shadow-xl mb-8 border-b border-slate-800">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-white">Sistema de Votação</h1>
            <a href="{{ route('polls.create') }}" 
               class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-2 rounded-lg transition shadow-lg shadow-blue-900/20 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nova Enquete
            </a>
        </div>
    </nav>

    <div class="container mx-auto px-6">
        <div class="mb-8 flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-extrabold text-white">Enquetes Disponíveis</h2>
                <p class="text-slate-400">Gerencie e acompanhe os resultados em tempo real.</p>
            </div>
        </div>

        @if($polls->isEmpty())
            <div class="bg-slate-900 rounded-xl p-12 text-center shadow-sm border-2 border-dashed border-slate-800">
                <p class="text-slate-500 text-lg">Nenhuma enquete cadastrada ainda.</p>
                <a href="{{ route('polls.create') }}" class="text-blue-400 font-bold hover:text-blue-300 mt-2 inline-block text-sm transition">Criar minha primeira enquete</a>
            </div>
        @else
            <div class="flex flex-wrap -mx-4">
                @foreach($polls as $poll)
                    <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                        <div class="group bg-slate-900 border border-slate-800 rounded-2xl shadow-lg hover:shadow-blue-900/10 hover:border-slate-700 transition-all duration-300 flex flex-col h-full overflow-hidden relative">
                            
                            <div class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                <a href="{{ route('polls.edit', $poll) }}" class="p-2 bg-slate-800 text-amber-400 rounded-full hover:bg-amber-500 hover:text-white transition shadow-sm" title="Editar Enquete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                
                                <form action="{{ route('polls.destroy', $poll) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta enquete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-800 text-red-400 rounded-full hover:bg-red-500 hover:text-white transition shadow-sm" title="Excluir Enquete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div class="p-6">
                                <div class="mb-4">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider
                                        {{ $poll->status == 'Em andamento' ? 'bg-green-900/30 text-green-400' : '' }}
                                        {{ $poll->status == 'Finalizada' ? 'bg-red-900/30 text-red-400' : '' }}
                                        {{ $poll->status == 'Não iniciada' ? 'bg-amber-900/30 text-amber-400' : '' }}">
                                        {{ $poll->status }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold text-white leading-tight mb-4 group-hover:text-blue-400 transition-colors">
                                    {{ $poll->title }}
                                </h3>

                                <div class="space-y-2 text-sm text-slate-400 bg-slate-950/50 p-3 rounded-lg border border-slate-800/50">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Início: {{ $poll->start_date->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-rose-400/70">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-medium text-slate-400">Fim: {{ $poll->end_date->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto p-6 pt-0">
                                <a href="{{ route('polls.show', $poll) }}" 
                                   class="flex items-center justify-center gap-2 w-full text-center bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-900/20">
                                    Participar / Resultados
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>