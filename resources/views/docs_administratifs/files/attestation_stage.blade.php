@extends('layouts.app')
@section('content')
<div style="background-color: white;padding: 40px;font-size: 25px;" >
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
                40000
            </div>
        </div>
    </div>
    <p>
         
    </p>
    <h1 style="text-align: center;">
        ATTESTATION DE STAGE
    </h1>
    <p style="text-align: center;">
         
    </p>
    <p>
        <p style="text-align: center;">
            Je soussigné(e), M.  <strong>{{auth::user()->name}}</strong> .
        </p>
        <p style="text-align: center;">
            Fonction : <strong>{{auth::user()->professions}}</strong>.
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
            Atteste que l'Etudiant :<strong>{{$doc->user->name}} </strong>.
        </p>
        <p style="text-align: center;">
            a effectué un stage dans notre établissement du <strong>{{$doc->user->hiring_date}} </strong>
        </p>
        <p style="text-align: center;">
            au <strong>{{$doc->user->exit_date}} </strong>.
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
            Nous délivrons la présente attestation pour servir et valoir ce que de droit.
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
                                                  Fait à Marrakech, le {{date('d-m-Y')}}
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
             
        </p>
        <p style="text-align: center;">
            Le Chef d’Entreprise : <strong>{{auth::user()->name}}</strong>
        </p>
        <p style="text-align: center;">
          le cachet de l’entreprise
        </p>
    </p>

</div>

@endsection