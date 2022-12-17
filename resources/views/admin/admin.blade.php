@extends('admin.base')
@section('content')
<div class="wrapper">
    @php
        $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>TvNet AdminPanel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="{{ route('admin.report') }}" @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.dashboard') echo "class='active'" @endphp>Հաշվետվություններ</a></li>
            <li><a href="#"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.jobs') echo "class='active'" @endphp>Թափուր հաստիքներ</a></li>
            <li><a href="#"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.blog') echo "class='active'" @endphp>Բլոգ</a></li>
            <li><a href="#"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.services') echo "class='active'" @endphp>Սերվիսներ</a></li>
            <li><a href="#"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.packages') echo "class='active'" @endphp>Փաթեթներ</a></li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: black	;">
            <div class="container-fluid">
                <div class="float-left" style="color: white;">
                    <span>Hi, </span>
                    <i class="fa fa-user" ></i>
                    <span class="navbar-brand">{{$admin->first_name}}</span>
                </div>
            </div>
        </nav>
        <div id="page">
            @yield('page')
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

        });
    </script>
    <script> var url = '{{route('upload.report')}}'</script>
    <script src="{{asset('js/admin/formHandler.js')}}"></script>
@endsection
