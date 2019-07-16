@extends('layouts.app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Modification</h5>
                </div>
                <div class="panel-body">

                    <form action="{{ route("conges.update", [$conges->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('date_debut') ? 'has-error' : '' }}">
                            <label for="date_debut">Date_debut</label>
                            <input type="date" id="date_debut" name="date_debut" class="form-control" value="{{ $conges->date_debut}}">
                        </div>
                        <div class="form-group {{ $errors->has('date_fin') ? 'has-error' : '' }}">
                            <label for="date_fin">Date_fin</label>
                            <input type="date" id="date_fin" name="date_fin" class="form-control" value="{{ $conges->date_fin }}">
                            
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Sauvgarder">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection