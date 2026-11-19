<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
</head>
<body>
    <main class="app-shell">
        <header class="app-header">
            <h1>TaskFlow</h1>
            <p>Stay focused on what needs to get done today.</p>
        </header>

        @if(session('status'))
            <div class="flash">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="error-text">{{ $errors->first('title') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>