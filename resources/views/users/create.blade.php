@extends('layouts.app')
@section('content')
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="{{ route("users.store") }}" enctype="multipart/form-data">

                        {!! csrf_field() !!}
                        <h1>Ajouter un utilisateur</h1>
                        <p class="text-muted">Entrez les informations</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" value="{{ old('name') }}"
                                   placeholder="Full Name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-------------------photo------------------------------------------>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-user"></i>
                              </span>
                            </div>
                            <input type="file" class="form-control {{ $errors->has('photo')?'is-invalid':'' }}" name="photo"
                                   placeholder="Photo">
                            @if ($errors->has('photo'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!------------------------------------------------------------->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':''}}" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="icon-lock"></i>
                              </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="Confirm password">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                               </span>
                            @endif
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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="cui-screen-smartphone nav-icon"></i>
                              </span>
                            </div>
                            <input type="text" name="tel" placeholder="Phone number">
                            @if($errors->has('tel'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tel') }}
                                </em>
                            @endif

                        </div>
                        <!------------------------------------------------------------->
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Ajouter</button>
                        <a href="{{ url('/users') }}" class="btn btn-success btn-block btn-flat"">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
