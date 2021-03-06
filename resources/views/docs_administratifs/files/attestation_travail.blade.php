@extends('layouts.app')
@section('content')
    <div id="sidebar">
        <div id="outline">
        </div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1"><div class="pc pc1 w0 h0">
                <img class="bi x0 y0 w1 h1" alt="" src="{{asset('/storage/'.$entreprise->logo)}}"/><div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">{{substr($entreprise->adresse,0,24)}} </div><div class="t m0 x1 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">{{substr($entreprise->adresse,24)}}</div><div class="t m0 x1 h2 y3 ff1 fs0 fc0 sc0 ls0 ws0">Tel :{{$entreprise->tel}} </div><div class="t m0 x1 h2 y4 ff1 fs0 fc0 sc0 ls0 ws0">N° RC : {{$entreprise->rc}} </div><div class="t m0 x1 h2 y5 ff1 fs0 fc0 sc0 ls0 ws0">N° de Patente : {{$entreprise->patente}}</div><div class="t m0 x1 h2 y6 ff1 fs0 fc0 sc0 ls0 ws0">N° Id.fisc : {{$entreprise->idfisc}} </div><div class="t m0 x1 h2 y7 ff1 fs0 fc0 sc0 ls0 ws0">{{$entreprise->zip_code}}</div><div class="t m0 x2 h3 y8 ff2 fs1 fc0 sc0 ls0 ws0">Attestation de travail</div><div class="t m0 x0 h4 y9 ff1 fs2 fc0 sc0 ls0 ws0">Madame, Monsieur,</div><div class="t m0 x0 h5 ya ff1 fs2 fc0 sc0 ls0 ws0">Nous certifions que {{$doc->user->polite}} .<span class="ff2">{{$doc->user->name}}</span> titulaire de la CIN N° <span class="ff2">{{$doc->user->cin}}</span> est </div><div class="t m0 x0 h4 yb ff1 fs2 fc0 sc0 ls0 ws0">employé par la société {{$entreprise->raison_sociale}} dont le siège social est situé à  </div><div class="t m0 x0 h4 yc ff1 fs2 fc0 sc0 ls0 ws0">{{$entreprise->adresse}},{{$entreprise->zip_code}}, en tant </div><div class="t m0 x0 h5 yd ff1 fs2 fc0 sc0 ls0 ws0">que <span class="ff2"> {{$doc->user->professions}} </span> en contrat à durée indéterminée </div><div class="t m0 x0 h5 ye ff1 fs2 fc0 sc0 ls0 ws0">depuis le <span class="ff2">{{$doc->user->hiring_date}}</span>. jusqu à ce jour.</div><div class="t m0 x0 h4 yf ff1 fs2 fc0 sc0 ls0 ws0">La présente attestation est délivrée à l’intéressé(e) sur sa demande pour servir et </div><div class="t m0 x0 h4 y10 ff1 fs2 fc0 sc0 ls0 ws0">valoir ce que de droit.</div><div class="t m0 x0 h4 y11 ff1 fs2 fc0 sc0 ls0 ws0">Nous vous prions de croire, Madame, Monsieur, à l’expression de nos salutations </div><div class="t m0 x0 h4 y12 ff1 fs2 fc0 sc0 ls0 ws0">distinguées.</div><div class="t m0 x0 h4 y13 ff1 fs2 fc0 sc0 ls0 ws0">Fait à Marrakech </div><div class="t m0 x0 h4 y14 ff1 fs2 fc0 sc0 ls0 ws0">le <strong>{{date('d/m/Y')}}</strong></div><div class="t m0 x1 h4 y15 ff1 fs2 fc0 sc0 ls0 ws0">Signature</div></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div></div>
    </div>
    <div class="loading-indicator">

    </div>
    <script>
        try{
            theViewer.defaultViewer = new theViewer.Viewer({});
        }catch(e){}
    </script>
@endsection