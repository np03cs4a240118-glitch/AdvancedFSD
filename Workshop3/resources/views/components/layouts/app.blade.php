<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Task Manager' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="app-layout">

        <x-navigation />

        <div class="main-content">

            <header class="topbar">
                Task Management System
            </header>

            <main class="content">

                {{ $slot }}

            </main>

        </div>

    </div>

</body>

</html>