@extends('layouts.app')
@section('content')
<br />
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Status Salaire</h3>
    </div>
    <div class="panel-body">

        <a class="btn btn-sm btn-dark" href="{{ route('export') }}">Export Data csv</a>

        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
                 <tr>
                     <th>Mois</th>
                     <th>Nom</th>
                     <th>Salaire</th>
                     <th>Salaire Net</th>
                     <th>Prime</th>
                     <th>Heures travaillée</th>
                     <th>Congé (J)</th>
                     <th>Cause</th>
                 </tr>
            </thead>
            <tbody>
                 @foreach($data as $row)
                     <tr>
                         <td>{{ $row->mois }}</td>
                         <td>{{ $row->name }}</td>
                         <td>{{ $row->gross_salary }}</td>
                         <td>{{ $row->net_salary }}</td>
                         <td></td>
                         <td>{{191-$row->somme_conge_mois*8}}</td>
                         <td>{{ $row->somme_conge_mois }} </td>
                         <td>{{$row->cause}}</td>
                     </tr>
                 @endforeach
            </tbody>
        </table>


    </div>
</div>
@endsection