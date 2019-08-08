{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Live search in laravel using AJAX</title>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}
@extends('layouts.app')
@section('content')
<br />
<div class="container box">

    <h4 align="center">Recherche dans les congés</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="La barre de recherche" />
            </div>
            <div class="table-responsive">
                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Cause</th>
                        <th>date debut</th>
                        <th>date fin</th>
                        <th>etat final</th>
                        <th>nombre de jour</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<a style="margin-top:20px;" class="btn btn-dark" href="http://127.0.0.1:8000/conges">
    Annuler
</a>
</body>
</html>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ url('/conges/live_search/action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){

            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
@endsection