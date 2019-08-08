@extends('layouts.app')
@section('content')
    <div style="background-color: white;padding: 40px;font-size: 22px;" >
        <div class="row" >
            <div class="col">
                <p style="padding-left: 60px; text-align: left;" align="center">
                    <img  src="{{asset('/storage/'.$entreprise->logo)}}" alt="" width="298" height="60" />
                </p>
            </div>
            <div class="col">
                <div  style="text-align: right;">
                    {{substr($entreprise->adresse,0,24)}}
                </div>
                <div  style="text-align: right;">
                    {{substr($entreprise->adresse,24)}}
                </div>
                <div  style="text-align: right;">
                    Tel : {{$entreprise->tel}}
                </div>
                <div  style="text-align: right;">
                    N° RC : {{$entreprise->rc}}
                </div>
                <div  style="text-align: right;">
                    N° de Patente : {{$entreprise->patente}}
                </div>
                <div style="text-align: right;">
                    N° Id.fisc : {{$entreprise->idfisc}}
                </div>
                <div  style="text-align: right;">
                    {{$entreprise->zip_code}}
                </div>
            </div>
        </div>
        <p>
             
        </p>
        <p>
            À <strong> {{$doc->user->polite}} </strong>. 
            <em>
                <strong>
                    <strong>{{$doc->user->name}}</strong>
                </strong>
            </em>
            <br />
            <br />
             
        </p>
        <p>
            <br />
            A Marrakech, le
            <strong>
                <strong>{{date('d/m/Y')}}</strong>
            </strong>
        </p>
        <p>
             
        </p>
        <p>
            <strong>
                Objet : 
            </strong>
            <strong>
                accusé de réception de votre lettre de démission
            </strong>
        </p>
        <p>
             
        </p>
        <strong>{{$doc->user->polite}} ,</strong>
                <em>
                    <strong>
                        <strong>{{$doc->user->name}}</strong>
                    </strong>
                </em>
                <strong>
                    ,
                </strong>

        <p>
            Nous accusons réception de votre lettre de démission datée du
            <strong>
                <strong>{{date('d/m/Y')}}</strong>
            </strong>
            .
        </p>
        <p>
            Nous vous informons que, compte tenu de votre qualification et de votre ancienneté, vous êtes tenu à un préavis d'unmois, qui prendra fin le
            <strong>
                <strong>{{$entreprise->exit_date}}</strong>
            </strong>
            .
        </p>
        <p>
            À l'issue de cette période, nous vous remettrons un reçu pour solde de tout compte, un certificat de travail, Une copie du dernier bulletin de paie ainsi qu’une attestation Pôle.
        </p>
        <p>
            Veuillez agréer, M
            <em>
                <strong>
                    {{$doc->user->name}}
                </strong>
            </em>
            , l'expression de nos sentiments distingués.
        </p>
        <p style="text-align: center;">
             
        </p>
        <div style="margin-top: 240px;">
        <p style="text-align: center;">
            <strong>
                <em>
                    <img src="http://pluspng.com/img-png/line-png-hd-decorative-line-black-png-hd-png-image-200.png" alt="" width="500" height="60" />
                </em>
            </strong>
        </p>
            <p style="text-align: center;">
                {{$entreprise->raison_sociale}} • {{$entreprise->adresse}},{{$entreprise->zip_code}} Marrakech Maroc N° RC {{$entreprise->rc}}  •  N° de Patente {{$entreprise->patente}}  •  N° Id.fisc {{$entreprise->idfisc}} Tel : {{$entreprise->tel}}
            </p>
        <p style="text-align: center;">
            <em>
                 
            </em>
        </p>
        <p style="text-align: center;">
             
        </p>
        </div>
    </div>
@endsection