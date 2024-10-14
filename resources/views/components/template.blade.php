<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | practice</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
</head>

<body class="h-full">
    <div class="min-h-full" x-data="{ isOpen: false }">
        {{ $slot }}
    </div>
    <div id="notif" x-data="{ open: true }" x-show="open"
        class="w-64 lg:w-[18rem] m-5 absolute top-0 right-0 z-50 bg-gradient-to-r from-zinc-700 to-slate-500  rounded-xl drop-shadow-lg">
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js">
    </script>
    <script src="/../assets/js/script.js"></script>
    <script>
        @session('notification')
        const judul = "{{ $value[0] }}";
        const pesan = "{{ $value[1] }}";
        const warna = "{{ $value[2] }}";
        notification(judul, pesan, warna)
        @endsession
    </script>
</body>

</html>
