@extends('layouts.app')
@section('content')
<div class="card" style="background-color:#e4e5e6;">
    <div>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i> </li>
            <li><a href="{{url('/home')}}">Home</a></li>
        </ul>
    </div>
        <h4 align="center">Fêtes et jours fériés au Maroc</h4>

<div class="card-body">
    @if(count($free_days) > 0)
        <table class="table table-striped table-bordered datatable dataTable no-footer">
            <thead class="thead-dark">
            <th scope="col">Date</ths>
            <th scope="col"> Description </th>
            <th scope="col"> Action </th>
            </thead>
            <tbody>
            @foreach($free_days as $free_day)
                <tr>
                    <td scope="row"> {{$free_day->day}}</td>
                    <td scope="row"> {{$free_day->description}}</td>
                    <td scope="row">
                        
                        <form method="POST" action="{{ route('free_days.destroy', ['id' => $free_day->id]) }}">
                            <div class="btn-group">
                                @can('Modifier_free_day')
                                <a href="/free_days/{{$free_day->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                @endcan
                                <!---------------------------------------------->
                                @can('Supprimer_free_day')
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
@endsection