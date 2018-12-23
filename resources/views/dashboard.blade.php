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
            setEntryGraph(0);
        });


        function setEntryGraph(curBalance) {
            var ajaxUrl = "{{route('account.entry.ajax')}}";
            $.get(ajaxUrl, function (data) {
                var balInfo = data.balInfo;
                var dates = [];
                var balances = [];
                var incomes = [];
                var costs = [];
                balInfo.forEach(function (info) {
                    if ($.inArray(moment(info.date).format("YYYY-MM-DD"), dates) === -1) {
                        dates.push(moment(info.date).format("YYYY-MM-DD"));
                    }
                });

                dates.forEach(function (date) {
                    var income = 0;
                    var cost = 0;
                    balInfo.forEach(function (info) {
                        if (info.date == date){
                            if(info.type === "INCOME"){
                                income += info.balance;
                            }else {
                                cost += (info.balance * -1);
                            }
                        }
                    });
                    incomes.push(income.toFixed(2));
                    costs.push(cost.toFixed(2));
                    curBalance += (income - cost);
                    balances.push(curBalance.toFixed(2));
                });
                new Chart("graph", {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                fill: false,
                                label: 'Current Balance',
                                data: balances,
                                backgroundColor: [
                                    'rgba(0, 0, 255, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(0,0,255,1)',
                                ],
                                borderWidth: 1
                            },
                            {
                                fill: false,
                                label: 'Income',
                                data: incomes,
                                backgroundColor: [
                                    'rgba(0, 255, 0, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(0,255,0,1)',
                                ],
                                borderWidth: 1
                            },
                            {
                                fill: false,
                                label: 'Cost',
                                data: costs,
                                backgroundColor: [
                                    'rgba(255, 0, 0, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(255,0,0,1)',
                                ],
                                borderWidth: 1
                            }
                        ]

                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    display: true
                                }
                            }]
                        },
                        responsive: true,
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: "Entry Table Graph (Day to Day Data)"
                        }
                    }

                });
            });
        }
    </script>
@endsection