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
{{--                -------------------------------------------------------}}
                    <tr>
                        <th>
                            CIN
                        </th>
                        <td>
                            {{$user->cin}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            CNSS
                        </th>
                        <td>
                            {{$user->cnss}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Polite
                        </th>
                        <td>
                            {{$user->polite}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Adresse
                        </th>
                        <td>
                            {{$user->adress}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date d'embauche
                        </th>
                        <td>
                            {{$user->hiring_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date de sortie
                        </th>
                        <td>
                            {{$user->exit_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Birth day
                        </th>
                        <td>
                            {{$user->birth_date}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Num Ordre
                        </th>
                        <td>
                            {{$user->order_number}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Professions
                        </th>
                        <td>
                            {{$user->professions}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Salaire net
                        </th>
                        <td>
                            {{$user->net_salary}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Salaire gross
                        </th>
                        <td>
                            {{$user->gross_salary}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Situation familialle
                        </th>
                        <td>
                            {{$user->family_situation}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre d'enfants
                        </th>
                        <td>
                            {{$user->nbr_children}}
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