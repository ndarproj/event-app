<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gray-200 flex flex-col">
    <nav class="bg-white h-16 p-4 shadow-lg ">
        <h1>Event App</h1>
    </nav>
    <main class="container max-w-5xl mx-auto pt-8">
        {{ $slot }}
    </main>
</body>

</html>
