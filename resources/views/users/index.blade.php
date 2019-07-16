@extends('layouts.app')
@section('content')
    <div>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i> </li>
            <li><a href="{{url('/home')}}">Home</a></li>
        </ul>
    </div>

<div class="row">
    @foreach($users as $user)
        <div class="col-sm-12 col-md-3" style="border: 1px solid grey;border-radius: 12px;">
            <div class="thumbnail">
            @if($user->photo)
            <img src="{{asset('/storage/'.$user->photo)}}"  class="img-thumbnail" style="width: 215px;">
            @else
            <img src="{{asset('default.png')}}"  class="img-thumbnail" style="width: 215px;">
            @endif
            <div class="caption">
                <h3>{{$user->name}}</h3>
                <p>{{$user->email}}</p>
                <p>Ajouter le :{{$user->created_at}}</p>
                <p style=" background-color: lightgreen;">Role :{{$user->getRoleNames()}}</p>
                <p><!--bouttons------------------------------->
                    <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
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
<br>
<a class="btn btn-primary" href="/users/create"> Ajouter un Utilisateur </a>

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