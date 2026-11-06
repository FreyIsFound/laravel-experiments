@props([
    'title' =>"Heroes Lodge"
])
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>


    <style>
        .max-w-400{
            max-width: 200px;
            margin: auto;
        }
        .card{
            background: grey;
            padding: 1rem;
            text-align: center;
        }
        nav > a {
            color: red;
        }
    </style>

</head>
<body class="bg-gray-700 p-6 max-w-xl mx-auto">
<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/contact">Contact</a>
{{--    <a href="/test">test</a>--}}
    <a href="/items">Item List</a>
</nav>

<main>
    {{ $slot }}
</main>


</body>
</html>
