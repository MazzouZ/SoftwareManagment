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
{{--                    <label class="switch switch-3d switch-primary">--}}
{{--                        <input class="switch-input" type="checkbox">--}}
{{--                        <span class="switch-slider"></span>--}}
{{--                    </label>test--}}
{{--                    <br>--}}
                    <input type="checkbox" name="commentaire[]" id="commentaire" value="attestation de travail">
                    <label for="attestation de travail">Attestation de travail</label>
                    <br>
                    <input type="checkbox" name="commentaire[]" id="attestation de stage" value="attestation de stage">
                    <label for="attestation de stage">attestation de stage</label>
                    <br>
                    <input type="checkbox" name="commentaire[]" id="attestation de pôle d'emploi" value="attestation de pôle d'emploi">
                    <label for="attestation de pôle d'emploi">attestation de pôle d'emploi</label>
                    <br>
                    <input type="checkbox" name="commentaire[]" id="attestation de salaire" value="attestation de salaire">
                    <label for="attestation de salaire">attestation de salaire</label>
                    <br>
                    <input type="checkbox" name="commentaire[]" id="accusé de réception de lettre de démission" value="accusé de réception de lettre de démission">
                    <label for="accusé de réception de lettre de démission">accusé de réception de lettre de démission</label>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="Demander">
                    <a  class="btn btn-dark" href="http://127.0.0.1:8000/docs_administratifs">
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
