@extends('layouts.app')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5>Modification</h5>
                </div>
                <div class="panel-body">

                    <form action="{{ route("users.update", [$users->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                        <!-------------------Role------------------------------------------>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fa fa-flag nav-icon"></i>
                              </span>
                            </div>
                            <select name="role" class="form-control form-control-sm" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </em>
                            @endif

                        </div>
                        <!-------------------photo------------------------------------------>
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
                        <!------------------------------------------------------------->
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