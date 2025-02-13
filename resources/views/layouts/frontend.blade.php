<!DOCTYPE html>
<html lang="en">

@include('components.frontend.head')
<!-- Devicon CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">


<body>
    @include('components.frontend.navbar')

    @include('components.frontend.header')

    @yield('content')

    @include('components.footer')

    <script src="{{ asset('frontend/main.js') }}"></script>
</body>

</html>
