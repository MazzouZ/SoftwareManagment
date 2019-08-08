@extends('layouts.app')
@section('content')

    <div class="card" >
        <div class="card-header">
             <h4 align="center">liste des Permissions</h4>
        </div>
        <div class="card-body">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_filter"><label>Recherche:<input id="myInput" class="form-control form-control-sm" type="search" placeholder="" /></label></div>
            </div>
            @if(count($permissions) > 0)
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="thead-dark">
                    <th scope="col" > ID </th>
                    <th scope="col"> Name </th>
                    </thead>
                    <tbody id="myTable">
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