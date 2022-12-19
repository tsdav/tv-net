@extends('admin.base')
@section('content')
    @php $admin = session()->get('admin', ''); @endphp
    <div class="wrapper">
    @php
        $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
    @endphp
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>TvNet AdminPanel</h3>
        </div>
        <ul class="list-unstyled components">
            <li><a href="{{ route('admin.report') }}" @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.report') echo "class='active'" @endphp>Հաշվետվություններ</a></li>
            <li><a href="{{ route('admin.services') }}"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.services') echo "class='active'" @endphp>Սերվիսներ</a></li>
            <li><a href="{{ route('admin.packages') }}"  @php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'admin.packages') echo "class='active'" @endphp>Փաթեթներ</a></li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: black	;">
            <div class="container-fluid">
                <div class="float-left" style="color: white;">
                    <span>Բարև, </span>
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

@endsection
