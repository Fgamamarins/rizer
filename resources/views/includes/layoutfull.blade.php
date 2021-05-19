@include('includes.header')
<div class="container-scroller">
    @include('includes.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('includes.sidebar')
        <div class="main-panel">
            {{--            <div class="content-wrapper">--}}
            @yield('content')
            {{--            </div>--}}
            @include('includes.footer')
        </div>
    </div>
</div>
@include('includes.js')
@stack('scripts')