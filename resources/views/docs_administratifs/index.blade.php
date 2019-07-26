@extends('layouts.app')
@section('content')
    <div class="card" style="background-color:#e4e5e6;">
        <div>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i> </li>
                <li><a href="{{url('/home')}}">Home</a></li>
            </ul>
        </div>
        <h4 align="center">liste des documents</h4>

        <div class="card-body">
            @if(count($docs_administratifs) > 0)
                <table class="table table-striped table-bordered datatable dataTable no-footer">
                    <thead class="thead-dark">
                    <th scope="col">Nom d'utilisateur</th>
                    <th scope="col">Fichiers demander</th>
                    <th scope="col"> Temp de reçue </th>
                    <th scope="col"> Etat </th>
                    <th scope="col"> Demender le </th>
                    <th scope="col"> Action </th>
                    </thead>
                    <tbody>
                    @foreach($docs_administratifs as $docs_administratif)
                        <tr>
                            <td scope="row"> {{$docs_administratif->user->name}}</td>
                            <td scope="row"> {{$docs_administratif->titre}}</td>
                            <td scope="row"> {{$docs_administratif->date_recue}}</td>
                            <td scope="row">
                                @if($docs_administratif->etat=="En attente")
                                    <span class="badge badge-warning"> {{$docs_administratif->etat}}</span>
                                @elseif($docs_administratif->etat=="Document n'existe pas")
                                    <span class="badge badge-danger"> {{$docs_administratif->etat}}</span>
                                @elseif($docs_administratif->etat=="Document reçue")
                                    <span class="badge badge-success"> {{$docs_administratif->etat}}</span>
                                @endif
                            </td>
                            <td scope="row"> {{$docs_administratif->created_at}}</td>
                            <td scope="row">
                                    <div class="btn-group">
                                        @role('Admin')<!---------------------------------------------->
                                            <form method="POST" action="/docs_administratifs/envoyer" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{$docs_administratif->id}}" name="id">
                                                <button class="btn btn-sm btn-pill btn-success" type="submit">Imprimer</button>
                                            </form>
                                        @endrole
                                    </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$docs_administratifs->links()}}
            @else
                <p> aucun document dans le moment. </p>
            @endif
            @can('Demander_docs_administratif')
                <a class="btn btn-primary" href="/docs_administratifs/create"> Demander un document </a>
            @endcan
        </div>
    </div>
@endsection