@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Ajouté un jour férié
    </div>

    <div class="card-body">
        <form action="{{ route("free_days.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('day') ? 'has-error' : '' }}">
                <label for="day">Jour</label>
                <input type="date" id="day" name="day" class="form-control"  required>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control datetime"  required></textarea>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
                <a  class="btn btn-dark" href="http://127.0.0.1:8000/free_days">
                    Annuler
                </a>
            </div>

        </form>
    </div>
</div>

@endsection