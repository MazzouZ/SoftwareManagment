@extends('layouts.app')
@section('content')
    <div class="card" >
        <div class="card-header">
        <h3 align="center">Rapport des congés</h3>
        </div>

        <div class="card-body">
{{--            <div class="col">--}}
{{--            @if(count($years) > 0)--}}
{{--              <h5>Filter By</h5>--}}
{{--                @foreach($years as $Y)--}}
{{--                    <a href="/conges/filterByYear/{{$Y->year}}">--}}
{{--                <button class="btn btn-lg btn-primary btn-ladda ladda-button" data-style="expand-right">--}}
{{--                    <span class="ladda-label">{{$Y->year}}</span>--}}
{{--                    <span class="ladda-spinner"></span>--}}
{{--                </button>--}}
{{--                    </a>--}}
{{--                @endforeach--}}
{{--            </div>--}}
            @if(isset($reports))
            <div class="row">
                @foreach($years as $Y)
                    <table class="table table-striped table-bordered datatable dataTable no-footer col-md-4" style="margin-left: 10px">
                        <thead class="thead-dark">

                        <tr>
                            <th colspan="3" class="title"> {{$Y->year}}</th>
                        </tr>
                        <tr>
                            <th scope="col">Nom d'utilisateur</th>
                            <th scope="col"> Nombre de jour</th>
                            <th scope="col"> Nombre de jour rester</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            @if($report->year == $Y->year)
                                @foreach($users->where('id', $report->user_id) as $user)
                                    <tr>
                                        <td scope="row"> {{$user->name}}</td>
                                        <td scope="row"> {{$report->somme}}</td>
                                        <td scope="row"> {{$user->nbr_jour_rester}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                @endforeach
            </div>
            @else
                <p> aucun congé dans le moment. </p>
            @endif
        </div>
    </div>
@endsection