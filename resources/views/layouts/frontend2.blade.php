<!DOCTYPE html>
<html lang="en">

@include('components.frontend.head')
<!-- Devicon CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">



<body>
    @include('components.frontend.navbar')

    {{-- @include('components.frontend.header') --}}

    @yield('content')

    @include('components.footer')

    <script src="{{ asset('frontend/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>

</body>

</html>
