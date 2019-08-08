@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="panel-title">Rapport mensuel</h3>
        </div>
        <div class="col-md-6">
            <div class="dataTables_filter"><label>Recherche:<input id="myInput" class="form-control form-control-sm" type="search" placeholder="" /></label></div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable dataTable no-footer">
                <thead class="thead-dark">
                <tr>
                    <th>Mois</th>
                    <th>User</th>
                    <th>Congé</th>
                    <th>freedays</th>
                    <th>Required</th>
                    <th>Worked</th>
                    <th>Rapport</th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($p as $po)
                    <tr>
                        <td>{{$po->mois}}</td>
                        <td>{{$po->name}}</td>
                        <td>{{$po->somme_conge_mois}} j/mois</td>
                        <td>@php
                             $diff=0;
                             foreach(explode('|',$po->DateDiff) as $val)
                                $diff+=(int)$val;

                             $diff_without_free=0;
                             foreach (explode('|',$po->nombre_jour) as $val)
                                $diff_without_free+=(int)$val;
                            $free_days=$diff-$diff_without_free
                            @endphp
                            {{$free_days}} j/mois
                        </td>
                        <td>{{15*8-$po->somme_conge_mois*8}} h/mois</td>
                        <td>
                        @foreach($ws as $w)
                            @if($w->mois == $po->mois and $w->name == $po->name)
                                {{$w->seconds/3600}} h/mois

                            @endif
                        @endforeach
                        </td>
                        <td>
                            @foreach($ws as $w)
                                @if($w->mois == $po->mois and $w->name == $po->name)
                                   - {{(15*8-$po->somme_conge_mois*8)-($w->seconds/3600)}} h
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection
