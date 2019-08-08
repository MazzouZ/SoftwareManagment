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

                    <form action="{{ route("users.update", [$users->id]) }}" method="POST" enctype="multipart/form-data">
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
                        <!-------------------Role------------------------------------------>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fa fa-flag nav-icon"></i>
                              </span>
                            </div>
                            <select name="role" class="form-control form-control-sm" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($users->roles->contains($role->id))selected @endif>{{ $role->name }}</option>
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

                        <div class="form-group {{ $errors->has('tel') ? 'has-error' : '' }}">
                            <label for="tel">Télephone</label>
                            <input type="text" id="tel" name="tel" class="form-control" value="{{$users->tel}}">
                        
                        </div>
                         <div>
                             <input class="btn btn-danger" type="submit" value="Sauvgarder">
                             <a  class="btn btn-dark" href="http://127.0.0.1:8000/users">
                                 Annuler
                             </a>
                         </div>
                     </div><!------------------------------------------------------------->

                     <div class="col-md-4" style="margin-left: auto">
                             <div class="form-group {{ $errors->has('cin') ? 'has-error' : '' }}">
                                 <label for="cin">Num CIN:</label>
                                 <input type="text" id="cin" name="cin" class="form-control" value="{{$users->cin}}">
                             </div>

                             <div class="form-group {{ $errors->has('cnss') ? 'has-error' : '' }}">
                                 <label for="cnss">CNSS</label>
                                 <input type="text" id="cnss" name="cnss" class="form-control" value="{{$users->cnss}}">
                             </div>

                             <div class="form-group {{ $errors->has('polite') ? 'has-error' : '' }}">
                                 <label for="polite">Politesse </label>
                                 <select name="polite">
                                     <option value="Mr" selected>Mr</option>
                                     <option value="Mme" >Mme</option>
                                     <option value="Mlle" >Mlle</option>
                                 </select>
                             </div>

                             <div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">
                                 <label for="adress">adresse</label>
                                 <input type="text" id="adress" name="adress" class="form-control" value="{{$users->adress}}">
                             </div>

                             <div class="form-group {{ $errors->has('hiring_date') ? 'has-error' : '' }}">
                                 <label for="hiring_date">Date d'enbauche</label>
                                 <input type="date" id="hiring_date" name="hiring_date" class="form-control" value="{{$users->hiring_date}}">
                             </div>
                             <div class="form-group {{ $errors->has('exit_date') ? 'has-error' : '' }}">
                                 <label for="exit_date">Date de sortie</label>
                                 <input type="date" id="exit_date" name="exit_date" class="form-control" value="{{$users->exit_date}}">
                             </div>
                             <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                                 <label for="birth_date">Date Anniversaire</label>
                                 <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{$users->birth_date}}">

                             </div>
                             <div class="form-group {{ $errors->has('order_number') ? 'has-error' : '' }}">
                                 <label for="order_number">Numéro d'ordre</label>
                                 <input type="text" id="order_number" name="order_number" class="form-control" value="{{$users->order_number}}">

                             </div>
                             <div class="form-group {{ $errors->has('professions') ? 'has-error' : '' }}">
                                 <label for="professions">Profession</label>
                                 <input type="text" id="professions" name="professions" class="form-control" value="{{$users->professions}}">

                             </div>
                             <div class="form-group {{ $errors->has('net_salary') ? 'has-error' : '' }}">
                                 <label for="net_salary">Salaire Net</label>
                                 <input type="text" id="net_salary" name="net_salary" class="form-control" value="{{$users->net_salary}}">

                             </div>
                             <div class="form-group {{ $errors->has('gross_salary') ? 'has-error' : '' }}">
                                 <label for="gross_salary">Salaire Brut</label>
                                 <input type="text" id="gross_salary" name="gross_salary" class="form-control" value="{{$users->gross_salary}}">

                             </div>
                             <div class="form-group {{ $errors->has('family_situation') ? 'has-error' : '' }}">
                                 <label for="family_situation">Situation familliale</label>
                                 <select class="form-control" id="family_situation" name="family_situation" value="{{$users->family_situation}}">
                                     <option value="celibataire">celibataire</option>
                                     <option value="marié">marié</option>
                                 </select>
                             </div>
                             <div class="form-group {{ $errors->has('nbr_children') ? 'has-error' : '' }}">
                                 <label for="nbr_children">Nombre d'enfants</label>
                                 <input type="number" id="nbr_children" name="nbr_children" class="form-control" value="{{$users->nbr_children}}">

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