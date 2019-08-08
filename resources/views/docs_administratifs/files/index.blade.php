@extends('layouts.app')
@section('content')
<br>
<div class="row">
@foreach (explode(',',$doc->titre) as $d)
    @if($d == "attestation de travail")
    <div class="col-sm-6 col-md-4">
        <a href="/docs_administratifs/view_attestation_travail/{{$doc->id}}">
        <div class="card text-white bg-primary text-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <h3>Attestation de travail</h3>
                    <footer>Pour
                        <cite title="Source Title">{{$doc->user->name}}</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        </a>
    </div>
    @endif
    @if($d == "attestation de stage")
    <div class="col-sm-6 col-md-4">
        <a href="/docs_administratifs/view_attestation_stage/{{$doc->id}}">
        <div class="card text-white bg-success text-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <p><h3>Attestation de Stage</h3></p>
                    <footer>Pour
                        <cite title="Source Title">{{$doc->user->name}}</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        </a>
    </div>
    @endif
    @if($d == "attestation de pôle d'emploi")
    <div class="col-sm-6 col-md-4">
        <a href="#">
        <div class="card text-white bg-info text-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <p><h3>Attestation de pôle d'emploi</h3></p>
                    <footer>Pour
                        <cite title="Source Title">{{$doc->user->name}}</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        </a>
    </div>
    @endif
    @if($d == "attestation de salaire")
    <div class="col-sm-6 col-md-4">
        <a href="/docs_administratifs/view_recue_solde_compte/{{$doc->id}}">
        <div class="card text-white bg-warning text-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <p><h3>Attestation de Salaire</h3></p>
                    <footer>Pour
                        <cite title="Source Title">{{$doc->user->name}}</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        </a>
    </div>
    @endif
    @if($d == "accusé de réception de lettre de démission")
    <div class="col-sm-6 col-md-4">
        <a href="/docs_administratifs/view_accuse_reception/{{$doc->id}}">
        <div class="card text-white bg-danger text-center">
            <div class="card-body">
                <blockquote class="card-bodyquote">
                    <p><h3>Accusé de réception d’une lettre de démission </h3></p>
                    <footer>Pour
                        <cite title="Source Title">{{$doc->user->name}}</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
        </a>
    </div>
    @endif
@endforeach
</div>
@endsection