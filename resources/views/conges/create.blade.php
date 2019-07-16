@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Demande de congé
    </div>

    <div class="card-body">
        <form action="{{ route("conges.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('date_debut') ? 'has-error' : '' }}">
                <label for="date_debut">date de debut</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control"  required>
            </div>
            <div class="form-group {{ $errors->has('date_fin') ? 'has-error' : '' }}">
                <label for="date_fin">date de fin</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control datetime"  required>
            </div>
            <div class="form-group {{ $errors->has('justification') ? 'has-error' : '' }}">
                <label for="justification">Justification</label>
                <input type="file" id="justification" name="justification" class="form-control custom-file"  required>
            </div>
            <div class="form-group">
                <p style="text-align: justify;">
                    ->Pour demander de 1 à 2 jours Il faut les demander 5 jours d'avant<br>
                    ->Pour demander de 3 à 4 jours Il faut les demander 7 jours d'avant<br>
                    ->Pour demander de 5 à 10 jours Il faut les demander 1 Mois d'avant<br>
                    ->Pour demander Plus de 10 jours Il faut les demander 1 mois et 15 jours d'avant<br>
                    Si non votre congé sera refusé
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>

        </form>
    </div>
</div>

@endsection