@extends('layouts.app')
@section('content')
    <div class="card" style="background-color:#e4e5e6;">
        <div>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i> </li>
                <li><a href="{{url('/home')}}">Home</a></li>
            </ul>
        </div>
        <h4 align="center">Rapport des congés</h4>

        <div class="card-body">
            @if(count($conges) > 0)
                <button class="btn btn-lg btn-primary btn-ladda ladda-button" data-style="expand-right">
                    <span class="ladda-label">Submit</span>
                    <span class="ladda-spinner"></span>
                </button>
                {{$conges->links()}}
            @else
                <p> aucun congé dans le moment. </p>
            @endif
        </div>
    </div>
@endsection