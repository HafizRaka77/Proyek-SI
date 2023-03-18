<!DOCTYPE html>
<html lang="en">
    @include('admin.layout.head')
    <body>
        <div class="container-scroller">
            {{-- @include('admin.layout.banner') --}}
            @include('admin.layout.sidebar')
            <div class="container-fluid page-body-wrapper">
                @include('admin.layout.navbar')
                <div class="main-panel">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.layout.footer')
        @include('admin.layout.script')
    </body>
</html>
