<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Albert | Desafio Full-Stack Appmax</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <router-view></router-view>
        <preloader-component></preloader-component>
        <vue-snotify></vue-snotify>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>