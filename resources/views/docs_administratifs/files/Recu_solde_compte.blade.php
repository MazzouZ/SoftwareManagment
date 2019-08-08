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
		<h2 style="text-align: center;">
			<strong>
				<u>
					 Reçu pour solde de tout compte
				</u>
			</strong>
		</h2>
		<p style="text-align: center;">
			 
		</p>
		<p style="text-align: left;">
            Je soussignée <strong> {{$doc->user->polite}} </strong> <strong>{{$doc->user->name}}</strong>, titulaire de la CIN N°<strong>{{$doc->user->cin}}</strong> et immatriculé à la CNSS sous le numéro <strong>{{$doc->user->cnss}}</strong>, demeurant  <strong>{{$doc->user->adress}}</strong>, reconnais avoir reçu de la société  <strong>{{$entreprise->raison_sociale}}</strong>  la somme de
		</p>
		<p style="text-align: left;">
			........................................
		</p>
		<p style="text-align: left;">
			 
		</p>
		<p style="text-align: left;">
			Cette somme m’a été versée, pour solde de tout compte, en paiement de :
		</p>
		<p style="text-align: left;">
			- Salaire <strong>{{$doc->user->hiring_date}}</strong>  au <strong>{{$doc->user->exit_date}}</strong>.
		</p>
		<p style="text-align: left;">
			-Solde Congés payés à ce jour.
		</p>
		<p style="text-align: left;">
			 
		</p>
		<p style="text-align: left;">
			Ce reçu de solde de tout compte a été établi en deux exemplaires, dont un m’a été remis.
		</p>
		<p style="text-align: left;">
			 
		</p>
		<p style="text-align: left;">
			Fait à Marrakech, Le <strong>{{Date('d/m/Y')}}</strong>.
		</p>
		<p style="text-align: center;">
			 
		</p>
		<p style="text-align: center;">
			<strong>
				<em>
					 Signature de l’employeur
				</em>
			</strong>
			<strong>
				<em>
					 .
				</em>
			</strong>
			<strong>
				<em>
					            
				</em>
			</strong>
			<strong>
				<em>
					 Date et signature du salarié
				</em>
			</strong>
		</p>
		<p style="text-align: center;">
			<strong>
				<em>
					                                                                
				</em>
			</strong>
			<strong>
				<em>
					 Précédé de la mention « lu et approuvé »
				</em>
			</strong>
		</p>
		<p style="text-align: center;">
			 
		</p>
		<p style="text-align: center;">
			 
		</p>
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
@endsection