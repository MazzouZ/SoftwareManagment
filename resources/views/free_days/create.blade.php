@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Demande de congé
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
            </div>

        </form>
    </div>
</div>

@endsection