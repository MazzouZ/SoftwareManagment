@extends('layouts.app')
@section('content')
<div class="card" >
    <div class="card-header">
        <h4 align="center">Fêtes et jours fériés au Maroc</h4>
    </div>
<div class="card-body">
    <div class="col-md-6">
        <div class="dataTables_filter"><label>Recherche:<input id="myInput" class="form-control form-control-sm" type="search" placeholder="" /></label></div>
    </div>
    @if(count($free_days) > 0)
        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
            <th scope="col">Date</th>
            <th scope="col"> Description </th>
            <th scope="col"> Action </th>
            </thead>
            <tbody id="myTable">
            @php($t=0)
            @foreach($free_days as $free_day)
                <tr>
                    <td scope="row"> {{$free_day->day}}</td>
                    <td scope="row"> {{$free_day->description}}</td>
                    <td scope="row">
                        @php($t++)
                        <form method="POST" id="target{{$t}}" action="{{ route('free_days.destroy', ['id' => $free_day->id]) }}">

                            <div class="btn-group">
                                @can('Modifier_free_day')
                                <a href="/free_days/{{$free_day->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                @endcan
                                <!---------------------------------------------->
                                @can('Supprimer_free_day')
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="reset" onclick="return myFunction({{$t}})"><i class="fa fa-trash-o"></i></button>
                                @endcan
                            </div>
                        </form>
                        
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$free_days->links()}}
    @else
        <p> aucun Jour férier dans le moment. </p>
    @endif
    @can('Ajouter_free_day')
    <a class="btn btn-primary" href="/free_days/create"> Ajouter </a>
    @endcan
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
                    $( '#target'+x ).submit();
                }
            })
        }
    </script>
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