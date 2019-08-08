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
        <a class="btn btn-md btn-dark" href="{{ route('export') }}">Exporté les données sous fichier EXEL</a>
        <button @click="tableToExcel('table', 'Lorem Table')export" class="btn btn-info">TO CSV</button>
        <button id="pdf" class="btn btn-danger">TO PDF</button>

        <table class="table table-striped table-bordered datatable dataTable no-footer" ref="table" id="loremTable" summary="lorem ipsum sit amet" rules="groups" frame="hsides">
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
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(document).ready(function(){
        $("#myInput4").on("change", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
{{---------------------------------------------------------------------}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
<script>
    new Vue({
        data(){
            return{
                uri :'data:application/vnd.ms-excel;base64,',
                template:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
                base64: function(s){ return window.btoa(unescape(encodeURIComponent(s))) },
                format: function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            }
        },
        methods:{
            tableToExcel(table, name){

                if (!table.nodeType) table = this.$refs.table
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                window.location.href = this.uri + this.base64(this.format(this.template, ctx))
            }
        }
    }).$mount('#app')
</script>
@endsection