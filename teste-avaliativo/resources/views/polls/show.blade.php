<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $poll->title }} - Sistema de Votação</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body class="bg-slate-950 font-sans antialiased text-slate-200">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-slate-900 rounded-2xl shadow-2xl border border-slate-800 p-6">
            
            @livewire('poll-view', ['poll' => $poll])

        </div>
    </div>

    @livewireScripts
</body>
</html>