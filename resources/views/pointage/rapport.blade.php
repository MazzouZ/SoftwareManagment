@extends('layouts.app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Rapport mensuel</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered datatable dataTable no-footer">
                <thead class="thead-dark">
                <tr>
                    <th>User</th>
                    <th>Congé</th>
                    <th>freedays</th>
                    <th>Required</th>
                    <th>Worked</th>
                    <th>Rapport</th>
                </tr>
                </thead>
                <tbody>
                @foreach($p as $po)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->somme_conge_mois}}</td>
                        <td>{{$p->Date_Diff-$p->Date_Diff}}</td>
                        <td>{{15*8-$p->Date_Diff-$p->Date_Diff}}</td>
                        @foreach($ws as $w)
                            @if($w->jour)
                            <td>{{$p->}}</td>
                            <td>{{$p->}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
