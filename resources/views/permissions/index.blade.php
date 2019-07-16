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
             <h4 align="center">liste des Permissions</h4>
        </div>
        <div class="card-body">
            @if(count($permissions) > 0)
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="thead-dark">
                    <th scope="col" > ID </th>
                    <th scope="col"> Name </th>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td scope="row"> {{$permission->id}}</td>
                            <td scope="row"> {{$permission->name}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$permissions->links()}}
            @else
                <p> aucune Permission dans le moment. </p>
            @endif
        </div>
    </div>
@endsection