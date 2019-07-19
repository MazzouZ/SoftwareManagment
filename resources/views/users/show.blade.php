@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Détails
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nom
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                             Photo
                        </th>
                        <td>
                            <img src="{{asset('/storage/'.$user->photo)}}" style="height: 50px;width: 50px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Role
                        </th>
                        <td>
                            {{$user->getRoleNames()[0]}}
                        </td>
                    </tr>
                    <tr>

                        <th>
                            Télephone
                        </th>
                        <td>
                            {{$user->tel}}
                        </td>
                     </tr>
                     <tr>
                        <th>
                           Congé resté
                        </th>
                        <td>
                            {{$user->nbr_jour_rester}} / 18 jours
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
                Retour à la page precédente
            </a>
        </div>
    </div>
</div>
@endsection