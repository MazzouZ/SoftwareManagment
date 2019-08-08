@extends('layouts.app')
@section('content')

    <div class="card" >
        <div class="card-header">
            <h4 align="center">liste des Roles</h4>
        </div>
        <div class="card-body">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_filter"><label>Recherche:<input id="myInput" class="form-control form-control-sm" type="search" placeholder="" /></label></div>
            </div>
            @if(count($roles) > 0)
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="thead-dark">
                    <th scope="col"> Name </th>
                    <th scope="col"> Permissions </th>
                    <th scope="col"> Utilisateurs </th>
                    <th scope="col"> Action </th>
                    </thead>
                    <tbody id="myTable">
                    @php($t=0)
                    @foreach($roles as $role)
                        @php($t++)
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

                                <form method="POST" id="target{{$t}}" action="{{ route('roles.destroy', ['id' => $role->id]) }}">
{{--                                    ---------------------------------------}}
                                    <a href="/roles/{{$role->id}}/edit" class="btn btn-sm btn-pill btn-info">Modifier</a>
                                <!---------------------------------------------->
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="reset" onclick="return myFunction({{$t}})" class="btn btn-sm btn-pill btn-danger">Supprimer</button>
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
                    $( '#target'+x ).submit();
                }
            })
        }
    </script>
@endsection