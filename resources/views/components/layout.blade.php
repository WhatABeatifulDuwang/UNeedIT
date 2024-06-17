<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Untitled' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-nav>

    </x-nav>
    
    <main>
        {{ $slot }}
    </main>

    <x-footer>

    </x-footer>
</body>
</html>
