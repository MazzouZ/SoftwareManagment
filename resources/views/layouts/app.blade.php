<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/coreui.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/coreui-icons.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--    ------------------------------}}
{{--    <script src="{{asset('js/jspdf.js')}}"></script>--}}
{{--    <script src="{{asset('js/pdfFromHTML.js')}}"></script>--}}
{{--    <link rel="stylesheet" href="{{asset('css/f1.woff')}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset('css/f2.woff')}}"/>--}}
    <link rel="stylesheet" href="{{asset('css/base.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/fancy.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/main.css')}} "/>

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/home">
        <img class="navbar-brand-full" src="{{asset('/storage/'.$Entreprise->logo)}}" width="100" height="40"
             alt="Infyom Logo">
        <img class="navbar-brand-minimized" src="{{asset('/storage/'.$Entreprise->logo)}}" width="100"
             height="40" alt="Infyom Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto ">
        {{-------------------------------------------------------------Notification menu--}}

        @role('Admin')
        <li class="nav-item dropdown d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="icon-bell"></i>
                @if(count($restes) + count($docs) > 0 )
                <span class="badge badge-pill badge-danger">{{count($restes) + count($docs)}}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header text-center">
                    <strong>{{count($restes)}} Demandes de congé</strong>
                </div>
                @foreach($restes as $reste)
                <a class="dropdown-item" href="/conges" style="overflow: hidden">
                    <i class="cui-sun text-danger"></i> {{$reste->user->name}} a demander un congé</a>
                @endforeach
                <div class="dropdown-header text-center" >
                    <strong>{{count($docs)}} Demandes docs administratif</strong>
                </div>
                @foreach($docs as $doc)
                    <a class="dropdown-item" href="/docs_administratifs" style="overflow: hidden">
                        <i class="cui-sun text-danger"></i> {{$doc->user->name}} a demander un document</a>
                @endforeach
            </div>
        </li>
        @endrole
{{--        -----------------------------------------------------------------------------------------}}
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {!! Auth::user()->name !!}
            </a>

            <div class="dropdown-menu dropdown-menu-right">



                <a class="dropdown-item" href="http://127.0.0.1:8000/Profile/{{Auth::user()->id}}">
                    <i class="fa fa-user"></i> Profile</a>



                <a class="dropdown-item" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>Logout
                </a>
                <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="SBW8JIfMzxJcsEIDPc7isHNqcrRK9grZagpEHygC">
                </form>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        <div class="container">
            <div>
                @if(! preg_match('#docs_administratifs/#',URL::current(),$x))
                <ul class="breadcrumb">
                    <li><i class="icon-home"></i> </li>
                    <li><a href="{{url('/home')}}">Home</a></li>
                    <li><a href="{{ url()->previous() }}"> /  Retour</a></li>
                </ul>
                @endif
            </div>
            @yield('content')
       </div>
    </main>
</div>
{{--<footer class="app-footer">--}}
{{--    <div class="ml-auto">--}}
{{--        <span>A</span>--}}
{{--        <strong>{{$entreprise->raison_sociale}}</strong>--}}
{{--    </div>--}}
{{--</footer>--}}
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
{{--------------------------------------------}}
<script src="{{asset('js/compatibility.min.js')}}"></script>
<script src="{{asset('js/theViewer.min.js')}}"></script>
<script src="{{asset('js/printThis.js')}}"></script>
<script src="{{asset('js/csvExport.js')}}"></script>
@include('sweetalert::alert')
@yield('scripts')

</html>
