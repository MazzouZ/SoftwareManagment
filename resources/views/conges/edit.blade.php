@extends('layouts.app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5>Modification</h5>
                </div>
                <div class="card-body">

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
                        <div class="form-group {{ $errors->has('cause') ? 'has-error' : '' }}">
                            <label for="cause">Cause</label>
                            <input type="text" id="cause" name="cause" class="form-control"  value="{{ $conges->cause }}" required>
                        </div>
                        <div class="form-group {{ $errors->has('justification') ? 'has-error' : '' }}">
                            <label for="justification">Justification</label>
                            <input type="file" id="justification" name="justification" class="form-control custom-file"  >
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Sauvgarder">
                            <a  class="btn btn-dark" href="http://127.0.0.1:8000/conges">
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