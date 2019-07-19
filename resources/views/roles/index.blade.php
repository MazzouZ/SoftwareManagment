@extends('layouts.app')
@section('content')
    <div>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i> </li>
            <li><a href="{{url('/home')}}">Home</a></li>
        </ul>
    </div>
    <div class="card" style="background-color:#e4e5e6;">
        <div class="card-header-actions">
            <h4 align="center">liste des Roles</h4>
        </div>
        <div class="card-body">
            @if(count($roles) > 0)
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="thead-dark">
                    <th scope="col"> Name </th>
                    <th scope="col"> Permissions </th>
                    <th scope="col"> Utilisateurs </th>
                    <th scope="col"> Action </th>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td scope="row"> {{$role->name}}</td>
                            <td scope="row">
                                @foreach($role->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td scope="row">
                                @foreach($role->users as $R)
                                <span class="badge badge-secondary">{{$R->name}}</span>
                                @endforeach
                            </td>
                            <td scope="row">

                                <form method="POST" action="{{ route('roles.destroy', ['id' => $role->id]) }}">
{{--                                    ---------------------------------------}}
                                    <a href="/roles/{{$role->id}}/edit" class="btn btn-sm btn-pill btn-info">Modifier</a>
                                <!---------------------------------------------->
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-pill btn-danger">Supprimer</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$roles->links()}}
            @else
                <p> Aucun role dans le moment. </p>
            @endif
        </div>
        <a class="btn btn-primary" href="/roles/create"> Ajouter un autre Role </a>
    </div>
@endsection