<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PrivEdu Admin')</title>

    {{-- CSS WAJIB diload supaya struktur sesuai --}}
    <link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('cssAdmin/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="layout-container">

    {{-- Toggle (WAJIB sebelum sidebar sesuai CSS) --}}
    <input type="checkbox" id="sidebar-toggle">
    <label for="sidebar-toggle" class="toggle-btn">
        <i class="fa-solid fa-bars"></i>
    </label>

    {{-- Sidebar (WAJIB sederajat dengan content-wrapper) --}}
    @include('components.sidebar')

    {{-- Konten (WAJIB pakai class content-wrapper, bukan content) --}}
    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>
