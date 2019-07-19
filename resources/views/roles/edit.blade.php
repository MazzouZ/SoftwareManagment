@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Modifier le role
        </div>

        <div class="card-body">
            <form action="{{ route("roles.update" , [$role->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('role_name') ? 'has-error' : '' }}">
                    <label for="role_name">Role</label>
                    <input type="text" id="role_name" name="role_name" class="form-control" value="{{$role->name}}" required>
                </div>

                <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                    <label for="permissions">Permission</label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple" required>
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}" @if($role->permissions->contains($permission->id)) selected @endif>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('permissions'))
                        <em class="invalid-feedback">
                            {{ $errors->first('permissions') }}
                        </em>
                    @endif
                </div>


                <div>
                    <input class="btn btn-danger" type="submit" value="save">
                </div>
            </form>
        </div>
    </div>

@endsection