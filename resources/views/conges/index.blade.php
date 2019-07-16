@extends('layouts.app')
@section('content')
<div class="card" style="background-color:#e4e5e6;">
    <div>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i> </li>
            <li><a href="{{url('/home')}}">Home</a></li>
        </ul>
    </div>
        <h4 align="center">liste des congés</h4>

<div class="card-body">
    @if(count($conges) > 0)
        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
            <th scope="col" > ID </th>
            <th scope="col">Nom d'utilisateur</ths>
            <th scope="col"> Temp de depart </th>
            <th scope="col"> Temp de fin </th>
            <th scope="col"> Etat </th>
            <th scope="col"> Ajouté le </th>
            <th scope="col"> Nombre de jour</th>
            <th scope="col">Justification</th>
            <th scope="col"> Action </th>
            </thead>
            <tbody>
            @foreach($conges as $conge)
                <tr>
                    <td scope="row"> {{$conge->id}}</td>
                    <td scope="row"> {{$conge->user->name}}</td>
                    <td scope="row"> {{$conge->date_debut}}</td>
                    <td scope="row"> {{$conge->date_fin}}</td>
                    <td scope="row">@if($conge->etat=="En cours de Vérification")
                                         <span class="badge badge-warning"> {{$conge->etat}}</span>
                                    @elseif($conge->etat=="Refusé")
                                         <span class="badge badge-danger"> {{$conge->etat}}</span>
                                    @elseif($conge->etat=="Congé accepter")
                                         <span class="badge badge-success"> {{$conge->etat}}</span>
                                    @endif
                    </td>
                    <td scope="row"> {{$conge->created_at}}</td>
                    <td scope="row"> {{$conge->nbr_jour}}
                    </td>
                    <td scope="row">
                        <a href="{{asset('/storage/'.$conge->justification)}}" target="_blank" >Click pour voir la justification</a>

                    </td>
                    <td scope="row">
                        
                        <form method="POST" action="{{ route('conges.destroy', ['id' => $conge->id]) }}">
                            <div class="btn-group">
                            @can('Modifier_conge')
                            <a href="/conges/{{$conge->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            @endcan
                            <!---------------------------------------------->
                            @can('Supprimer_conge')
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
    @can('Demander_conge')
    <a class="btn btn-primary" href="/conges/create"> Demander un congé </a>
    @endcan
</div>
</div>
@endsection