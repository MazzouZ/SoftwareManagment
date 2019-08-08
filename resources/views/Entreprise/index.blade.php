@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h5>Informations concernant l'entreprise</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route("Entreprise.update", [$E->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                         <div class="row" style="    border: 2px solid #f86c6b;border-radius: 40px;padding: 40px">
                         <div class="col-md-5">
                            <div class="form-group">
                                    <label for="logo">Logo :</label>
                                    <img src="{{asset('/storage/'.$E->logo)}}" style="width: 160px;margin: auto">
                            </div>
                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                <input type="file" id="logo" name="logo" class="form-control" value="{{ $E->logo}}">
                            </div>
                            <div class="form-group {{ $errors->has('raison sociale') ? 'has-error' : '' }}">
                                <label for="raison sociale">Raison sociale</label>
                                <input type="text" id="raison sociale" name="raison_sociale" class="form-control" value="{{ $E->raison_sociale }}">

                            </div>
                            <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                                <label for="tel">tel</label>
                                <input type="text" id="tel" name="tel" class="form-control" value="{{ $E->tel }}">

                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">email</label>
                                <input type="text" id="email" name="email" class="form-control" value="{{ $E->email }}">

                            </div>
                        </div>
{{--                            -----------------}}
                         <div class="col-md-5" style="margin-left: 100px">
                            <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                                <label for="adresse">address</label>
                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $E->adresse }}">

                            </div>
                            <div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
                                <label for="zip_code">zip_code</label>
                                <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $E->zip_code }}">

                            </div>
                            <div class="form-group {{ $errors->has('rc') ? 'has-error' : '' }}">
                                <label for="rc">numero RC</label>
                                <input type="text" id="rc" name="rc" class="form-control" value="{{ $E->rc }}">

                            </div>
                            <div class="form-group {{ $errors->has('patente') ? 'has-error' : '' }}">
                                <label for="patente">Patente</label>
                                <input type="text" id="patente" name="patente" class="form-control" value="{{ $E->patente }}">

                            </div>
                            <div class="form-group {{ $errors->has('idfisc') ? 'has-error' : '' }}">
                                <label for="idfisc">ID fiscale</label>
                                <input type="text" id="idfisc" name="idfisc" class="form-control" value="{{ $E->idfisc }}">

                            </div>

                            <div>
                                <input class="btn btn-danger" type="submit" value="Sauvgarder">
                            </div>
                         </div>
                         </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection