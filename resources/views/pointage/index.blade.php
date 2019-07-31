@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Pointage</h3>
    </div>
    <div class="panel-body">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
            <br>
            <button class="btn btn-success">Import User Data</button>
        </form>
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
            <tbody>
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

@endsection