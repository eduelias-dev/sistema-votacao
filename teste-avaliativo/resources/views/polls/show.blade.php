<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $poll->title }} - Sistema de Votação</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl">
            
            @livewire('poll-view', ['poll' => $poll])

        </div>
    </div>

    @livewireScripts
</body>
</html>