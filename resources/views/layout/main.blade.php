<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <!-- Local Style -->
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Dashboard</title>
</head>
<body>
    @include('layout.partials.navbar')
        
    <main class="container-fluid">
        @yield('body')
    </main>

    <script src="/js/bootstrap.js"></script>
    @yield('script')
</body>
</html>