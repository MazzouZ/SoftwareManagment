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

                    <form action="{{ route("free_days.update", [$free_day->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('day') ? 'has-error' : '' }}">
                            <label for="day">Jour</label>
                            <input type="date" id="day" name="day" class="form-control" value="{{ $free_day->day}}">
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">Description</label>
                            <input type="text" id="description" name="description" class="form-control" value="{{ $free_day->description }}">
                            
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Sauvgarder">
                            <a  class="btn btn-dark" href="http://127.0.0.1:8000/free_days">
                                Annuler
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection