@extends('layouts.app')
@section('content')
    <div>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i> </li>
            <li><a href="{{url('/home')}}">Home</a></li>
        </ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="/users/create"> Ajouter un Utilisateur </a>
    </div>
        <br>


    @foreach($users as $user)
        <div class="col-md-4">
            <div class="thumbnail">
            @if($user->photo)
            <img src="{{asset('/storage/'.$user->photo)}}"  class="img-thumbnail">
            @else
            <img src="{{asset('default.png')}}"  class="img-thumbnail" >
            @endif
            <div class="caption">
                <h3 class="title">{{$user->name}}</h3>
                <p>Email: <span class="blueEffect">{{$user->email}}</span></p>
                <p>Role: <span class="blueEffect">{{$user->getRoleNames()[0]}}</span></p>
                <p><!--bouttons------------------------------->
                    <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                        <a href="/users/{{$user->id}}" class="btn btn-sm btn-pill btn-success">Détails</a>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-pill btn-warning">Modifier</a>

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-sm btn-pill btn-danger">Supprimer</button>
                    </form>
                 </p>
            </div>
            </div>
        </div>
    @endforeach
</div>

<!-- <div class="card" style="background-color:#e4e5e6;">
<div class="card-header-actions">
    <i class="fa fa-bookmark"></i>

    <h4>liste des congés</h4>
</div>
<div class="card-body">
    @if(count($users) > 0)
        <table class="table table-bordered table-striped table-hover datatable">
            <thead class="thead-dark">
            <th scope="col" > ID </th>
            <th scope="col"> Name </th>
            <th scope="col"> Ajouté le </th>
            <th scope="col"> Action </th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row"> {{$user->id}}</td>
                    <td scope="row"> {{$user->name}}</td>
                    <td scope="row"> {{$user->created_at}}</td>
                    <td scope="row">

                        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                            <a href="/users/{{$user->id}}/edit" class="btn btn-warning">Modifier</a>

                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    @else
        <p> aucun congé dans le moment. </p>
    @endif
    <a class="btn btn-primary" href="/users/create"> Ajouter un Utilisateur </a>
</div>
</div> -->
@endsection