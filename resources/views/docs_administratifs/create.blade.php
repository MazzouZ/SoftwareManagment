@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header" align="center">
            Demandé un Document
        </div>

        <div class="card-body">
            <form action="{{ route("docs_administratifs.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('commentaire') ? 'has-error' : '' }}">
                    <label for="commentaire">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="9"  required></textarea>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Demander">
                </div>

            </form>
        </div>
    </div>

@endsection
