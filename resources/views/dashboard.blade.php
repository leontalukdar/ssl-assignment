@extends('layouts.base')

@section('content')
    <div class="row">
        <h3>Current Balance: {{$currentBalance}}</h3>
    </div>
    <div class="row">
        <canvas id="graph" style="height: 350px; width: 100%;"></canvas>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            setEntryGraph();
        });


        function setEntryGraph() {
            var ajaxUrl = "{{route('account.entry.ajax')}}";
            $.get(ajaxUrl, function (data) {
                var dates = [];
                var balances = [];
                var incomes = [];
                var costs = [];

            });
        }
    </script>
@endsection