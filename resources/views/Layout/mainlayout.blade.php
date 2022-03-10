
{{-- Header --}}
@include('Layout.partials.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    {{-- Menu --}}
    @include('Layout.partials.nav')

    @yield('content')

    @include('Layout.partials.footer')

    </div>
    @include('Layout.partials.footer-scripts')
    @yield('aditionalScripts');
</body>
</html>
