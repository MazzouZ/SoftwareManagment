@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Informations concernant l'entreprise</h5>
                    </div>
                    <div class="panel-body">

                        <form action="{{ route("Entreprise.update", [$E->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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