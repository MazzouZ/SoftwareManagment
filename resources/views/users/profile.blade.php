@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h5>Modification</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route("updateProfile", [$users->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4" style="float: left">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nom</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $users->name}}">
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ $users->email }}">

                                </div>

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="laissez ce champ vide(le mot de passe ne sera pas changer)">

                                </div>
                                <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                                    <label for="confirm_password">Confirmation Mot de passe</label>
                                    <input type="password" id="password" name="confirm_password" class="form-control" placeholder="laissez ce champ vide(le mot de passe ne sera pas changer)">

                                </div>
                                <!-------------------photo------------------------------------------>
                                <div class="form-group">
                                    <label for="photo">Photo :</label>
                                    <img src="{{asset('/storage/'.$users->photo)}}" style="width: 160px;margin: auto">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                                    </div>
                                    <input type="file" class="form-control {{ $errors->has('photo')?'is-invalid':'' }}" name="photo" value="{{ old('photo') }}"
                                           placeholder="Photo">
                                    @if ($errors->has('photo'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                    @endif
                                </div>
{{--------------------------------------------------------------------------------------------------------------------------}}
                                <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                                    <label for="tel">Télephone</label>
                                    <input type="text" id="tel" name="tel" class="form-control" value="{{$users->tel}}">

                                </div>
                                <div>
                                    <input class="btn btn-danger" type="submit" value="Sauvgarder">
                                    <a  class="btn btn-dark" href="http://127.0.0.1:8000/home">
                                        Annuler
                                    </a>
                                </div>

                                {{----------------------------------------------------------------------}}

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection