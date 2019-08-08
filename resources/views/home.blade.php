@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn">

{{--            --------------------------------------------------}}
            <div class="card">

                    <div class="card-header">
                        Pointage par jour
                    </div>
                        <div class="col-sm-6">
                            <div class="callout callout-info">
                                <small class="text-muted">Etat d'utilisateur</small>
                                <br>
                                <strong class="h4"> / jour</strong>
                                <div class="chart-wrapper">
                                    <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="callout callout-danger">
                                <small class="text-muted">Etat naturel</small>
                                <br>
                                <strong class="h4">8 h/ jour</strong>
                                <div class="chart-wrapper">
                                    <canvas id="sparkline-chart-2" width="100" height="30"></canvas>
                                </div>
                            </div>
                        </div>


                 <div class="card-body">
                    @foreach($worked as $w)
                        <hr class="mt-0">
                        <div class="progress-group mb-4">
                            <div class="progress-group-prepend">
                                <span class="progress-group-text">{{$w->jour ." |"  .$w->name.' | '. $w->nbr_hour }} h</span>
                            </div>
                            <div class="progress-group-bars">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$w->nbr_hour * 10}}%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                 </div>

            </div>
        </div>
    </div>
</div>
@endsection
