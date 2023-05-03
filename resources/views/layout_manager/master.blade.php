@include('layout_manager.header')
@include('layout_manager.sidebar')
@include('layout_manager.navbar')
<main class="content">
    @yield('content')
</main>
@include('layout_manager.footer')