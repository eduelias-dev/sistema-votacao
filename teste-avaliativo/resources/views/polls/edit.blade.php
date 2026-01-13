<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Enquete</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white shadow-2xl rounded-2xl p-8 border border-gray-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Editar Enquete</h1>
        </div>

        <form action="{{ route('polls.update', $poll) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Título</label>
                <input type="text" name="title" value="{{ $poll->title }}" required
                    class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-blue-500 outline-none transition">
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Início</label>
                    <input type="datetime-local" name="start_date" value="{{ $poll->start_date->format('Y-m-d\TH:i') }}" required
                        class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-blue-500 outline-none transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Término</label>
                    <input type="datetime-local" name="end_date" value="{{ $poll->end_date->format('Y-m-d\TH:i') }}" required
                        class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-blue-500 outline-none transition text-sm">
                </div>
            </div>

            <div class="pt-4 flex flex-col gap-2">
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition shadow-lg">
                    Atualizar Dados
                </button>
                <a href="{{ route('polls.index') }}" class="text-center text-gray-400 hover:text-gray-600 text-sm py-2">
                    Descartar alterações
                </a>
            </div>
        </form>
    </div>
</body>
</html>