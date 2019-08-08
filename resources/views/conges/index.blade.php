@extends('layouts.app')
@section('content')
<div class="card" >
    <div class="card-header">
        <h4 align="center">liste des congés</h4>
    </div>
    <br>
    <br>
    <div class="col-md-12">
        @can('Demander_conge')
            <a class="btn btn-sm btn-pill btn-primary col-md-3" href="/conges/create"> Demander un congé </a>
        @endcan
        <a href="/conges/live_search" class="btn btn-sm btn-pill btn-warning col-md-3" style="margin-left: auto">
            <i class="fa fa-circle-o-notch fa-spin"></i>Recherche avancée
        </a>
    </div>
<div class="card-body">
    @if(count($conges) > 0)
        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Cause</th>
                <th scope="col" width="100">  Temp de depart </th>
                <th scope="col" width="100"> Temp de fin </th>
                <th scope="col"> Etat Système</th>
                <th scope="col" style="background-color: #a21414;"><span class="blueEffect">Décision finale</span> </th>
                <th scope="col" width="40"> Nombre de jour</th>
                <th scope="col" width="40"> Nombre de jour rester</th>
                <th scope="col">Justification</th>
                <th scope="col"> Action </th>
            </thead>
            <tbody>
            @php($t=0)

            @foreach($conges as $conge)
                <tr>@php($t++)
                    <td scope="row"> {{$conge->user->name}}</td>
                    <td scope="row"> <span class="badge badge-secondary"> {{$conge->cause}} </span> </td>
                    <td scope="row"> {{$conge->date_debut}}</td>
                    <td scope="row"> {{$conge->date_fin}}</td>
                    <td scope="row">@if($conge->etat=="Refusé par système")
                                         <span class="badge badge-danger"> {{$conge->etat}}</span>
                                    @elseif($conge->etat=="Congé accepter par système")
                                         <span class="badge badge-success"> {{$conge->etat}}</span>
                                    @endif
                    </td>
                    <td scope="row" style="background-color: #c59292;">
                        @if($conge->etat_Admin=="Refusé")
                            <span class="badge badge-danger"> {{$conge->etat_Admin}}</span>
                        @elseif($conge->etat_Admin=="Accepter")
                            <span class="badge badge-success"> {{$conge->etat_Admin}}</span>
                        @endif
                    </td>
                    <td scope="row"> {{$conge->nbr_jour}}
                    </td>
                    <td scope="row"> {{$conge->user->nbr_jour_rester}}</td>
                    <td scope="row">
                        @if(isset($conge->justification))
                            <div class="blueEffect">
                            <a href="{{asset('/storage/'.$conge->justification)}}" target="_blank" >Click pour voir la justification</a>
                            </div>
                        @else
                            <div class="blueEffect">
                            <i class="font-1xl text-danger cui-thumb-down"> Non Justifié</i>
                            </div>
                        @endif
                    </td>
                    <td scope="row">
                        
                        <form method="POST"  id="target{{$t}}" action="{{ route('conges.destroy', ['id' => $conge->id]) }}">
                            <div class="btn-group">
                            @can('Modifier_conge')
                            <a href="/conges/{{$conge->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            @endcan
                            <!---------------------------------------------->
                            @can('Supprimer_conge')
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                             <button class="btn btn-danger" type="reset" onclick="return myFunction({{$t}})"><i class="fa fa-trash-o"></i></button>
                            @endcan
                            <!---------------------------------------------->
                                @role('Admin')
                                    <button class="btn btn-success btn-sm dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-search-plus"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="/conges/{{$conge->id}}/accepter" class="btn btn-sm btn-pill btn-success">Accepter</a>
                                        <a href="/conges/{{$conge->id}}/Refuser" class="btn btn-sm btn-pill btn-secondary">Refusé</a>
                                    </div>
                                @endrole
                                </div>
                        </form>
                        
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$conges->links()}}
    @else
        <p> aucun congé dans le moment. </p>
    @endif
</div>
</div>
<script>
    function myFunction(x) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $( "#target"+x ).submit();
            }
        })
    }
</script>
@endsection