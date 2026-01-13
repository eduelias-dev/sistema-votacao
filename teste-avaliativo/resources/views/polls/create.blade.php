<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Enquete - Sistema de Votação</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased min-h-screen flex items-center justify-center p-4">

    <div class="max-w-2xl w-full bg-white shadow-xl rounded-2xl overflow-hidden">
        <div class="bg-blue-600 p-6">
            <h1 class="text-2xl font-bold text-white text-center">Configurar Nova Enquete</h1>
        </div>

        <div class="p-8">
            <form action="{{ route('polls.store') }}" method="POST" class="flex flex-col gap-6">
                @csrf

                <div class="flex flex-col gap-2">
                    <label class="font-bold text-gray-700">Título da Enquete</label>
                    <input type="text" name="title" required 
                        placeholder="Ex: Qual sua tecnologia favorita?"
                        class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition">
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Início da Votação</label>
                        <input type="datetime-local" name="start_date" required 
                            class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition">
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="font-bold text-gray-700">Término da Votação</label>
                        <input type="datetime-local" name="end_date" required 
                            class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-500 focus:outline-none transition">
                    </div>
                </div>

                <hr class="border-gray-100">

                <div id="options-container" class="flex flex-col gap-3">
                    <label class="font-bold text-blue-700 flex justify-between">
                        Opções de Resposta 
                        <span class="text-xs font-normal text-gray-500 underline self-end">Mínimo 3 opções obrigatórias</span>
                    </label>
                    <input type="text" name="options[]" placeholder="Opção 1" required class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-400 focus:outline-none transition">
                    <input type="text" name="options[]" placeholder="Opção 2" required class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-400 focus:outline-none transition">
                    <input type="text" name="options[]" placeholder="Opção 3" required class="border-2 border-gray-200 rounded-lg p-3 focus:border-blue-400 focus:outline-none transition">
                </div>

                <button type="button" onclick="addOption()" class="flex items-center gap-2 text-sm text-blue-600 font-bold hover:text-blue-800 transition self-start p-2 rounded hover:bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Adicionar mais uma opção
                </button>

                <div class="flex flex-col gap-3 mt-4">
                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-4 rounded-xl shadow-lg hover:bg-green-700 active:scale-[0.98] transition-all">
                        Salvar e Publicar Enquete
                    </button>
                    <a href="{{ route('polls.index') }}" class="text-center text-gray-500 hover:text-gray-700 text-sm font-medium py-2">
                        Cancelar e voltar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addOption() {
            const container = document.getElementById('options-container');
            const totalOptions = container.querySelectorAll('input').length;
            
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'options[]';
            newInput.placeholder = `Opção ${totalOptions + 1}`;
            newInput.className = 'border-2 border-gray-200 rounded-lg p-3 focus:border-blue-400 focus:outline-none transition animate-fade-in';
            
            container.appendChild(newInput);
        }
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.3s ease-out; }
    </style>
</body>
</html>