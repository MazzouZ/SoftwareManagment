@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="/users/create"> Ajouter un Utilisateur </a>
    </div>
        <br>
    @php($t=0)


    @foreach($users as $user)
        @php($t++)
        <div class="col-md-4">
            <div class="thumbnail">
            @if($user->photo)
            <img src="{{asset('/storage/'.$user->photo)}}"  class="img-thumbnail">
            @else
            <img src="{{asset('default.png')}}"  class="img-thumbnail" >
            @endif
            <div class="caption">
                <h3 class="title">{{$user->name}}</h3>
                <p>Email: <span class="blueEffect">{{$user->email}}</span></p>
                <p>Role: <span class="blueEffect">{{$user->getRoleNames()[0]}}</span></p>
                <p><!--bouttons------------------------------->
                    <form method="POST" id="target{{$t}}" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                        <a href="/users/{{$user->id}}" class="btn btn-sm btn-pill btn-success">Détails</a>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-pill btn-warning">Modifier</a>

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="reset" onclick="return myFunction({{$t}})" class="btn btn-sm btn-pill btn-danger">Supprimer</button>
                    </form>
                 </p>
            </div>
            </div>
        </div>
    @endforeach
</div>

    <script>
        function myFunction(x) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $( '#target'+x ).submit();
                }
            })
        }
    </script>
@endsection