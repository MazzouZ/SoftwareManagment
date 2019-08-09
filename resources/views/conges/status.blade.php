@extends('layouts.app')
@section('content')
<br />
<div class="card">

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-header">
        <h3 class="panel-title">Status Salaire</h3>
        </div>
    </div>
    <div class="card-body">
    <div class="panel-body">
        <select id="myInput3" type="search" class="col-sm-3">
            <option value="">Année</option>
            @php($i=0)
            @foreach($data as $row)
                <?php

                    $years[$i]=explode('-',$row->mois)[0];
                    $months[$i]=explode('-',$row->mois)[1];
                    $i++;
                ?>
            @endforeach

            @php($year=array_unique($years));
            @php($month=array_unique($months));

            @foreach($year as $row)
                 <option value="{{$row}}">{{$row}}</option>
            @endforeach
        </select>
        <select id="myInput4" type="search" class="col-sm-3">
            <option value="">mois</option>
            @foreach($month as $row)
                <option value="{{$row}}">{{$row}}</option>
            @endforeach
        </select>
        <button  class="btn btn-warning" onclick="fcb()">Annuler le filtrage</button>
        <br>
        <a class="btn btn-danger" href="{{ route('export') }}">Exporté tous les données( EXEL)</a>
        <button id="export" class="btn btn-info">Exporté ces données( EXEL)</button>
        <p></p>
        <table class="table table-striped table-bordered datatable dataTable no-footer" id="table">
            <thead class="thead-dark">
                 <tr>
                     <th>Mois</th>
                     <th>Nom</th>
                     <th>Salaire</th>
                     <th>Salaire Net</th>
                     <th>Prime</th>
                     <th>Heures travaillée</th>
                     <th>Congé (J)</th>
                     <th>Cause</th>
                 </tr>
            </thead>
            <tbody id="myTable">
                 @foreach($data as $row)
                     <tr>
                         <td>{{ $row->mois }}</td>
                         <td>{{ $row->name }}</td>
                         <td>{{ $row->gross_salary }}</td>
                         <td>{{ $row->net_salary }}</td>
                         <td></td>
                         <td>{{191-$row->somme_conge_mois*8}}</td>
                         <td>{{ $row->somme_conge_mois }} </td>
                         <td>{{$row->cause}}</td>
                     </tr>
                 @endforeach
            </tbody>
        </table>


    </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#myInput3").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                // $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                if(!($(this).text().toLowerCase().indexOf(value) > -1))
                    $(this).remove()
            });
        });
    });
    $(document).ready(function(){
        $("#myInput4").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                if(!($(this).text().toLowerCase().indexOf(value) > -1))
                    $(this).remove()
            });
        });
    });
    function fcb() {
        location.reload();
    }
</script>
{{---------------------------------------------------------------------}}

<script>
    $( "#export" ).click(function() {
        $('#table ').csvExport();
    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

@endsection