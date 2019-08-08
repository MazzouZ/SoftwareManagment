@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pointage</h3>
    </div>
    <div class="card-body">
        @can('import_pointage_data')
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv" class="form-group">

            <button class="btn btn-success" class="form-group">Importé les données Pointage</button>
        </form>
        @endcan
        <div class="col-md-6">
            <div class="dataTables_filter"><label>Recherche:<input id="myInput" class="form-control form-control-sm" type="search" placeholder="" /></label></div>
        </div>
        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
            <tr>
                <th>Jour</th>
                <th>Nom</th>
                <th>Time IN</th>
                <th>Time Out</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody id="myTable">
            @foreach($p as $po)
                <tr>
                    <td>{{ $po->jour }}</td>
                    <td>{{ $po->user->name }}</td>
                    <td>{{ $po->time_in }}</td>
                    <td>{{ $po->time_out }}</td>
                    <td>{{ $po->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $p->links() }}
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