@extends('layouts.base')

@section('content')
    <div class="row">
        <h3>Cricket ScoreBoard</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <h4>Events</h4>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-primary" id="one"> 1 </button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" id="two"> 2 </button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" id="three"> 3 </button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-primary" id="four"> 4 </button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" id="five"> 5 </button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" id="six"> 6 </button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-danger" id="bowled"> Bowled </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger" id="runOut"> Run Out </button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-danger" id="caught"> Caught </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger" id="stumps"> Stumps </button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-danger" id="lbw"> LBW </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success" id="noBall"> No Ball </button>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-success" id="wide"> Wide </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-warning" id="dottBall"> Dott Ball </button>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="liveScoreArea">
            <div class="row">
                <h4>Live Score</h4>
            </div>
            <div class="row">
                <div class="col-md-12" id="teamRun">
                    Team Run: 0
                </div>
                <div class="col-md-12" id="firstPlayer" style="color: green;">
                    Player 1: 0
                </div>
                <div class="col-md-12" id="secondPlayer">
                    Player 2: 0
                </div>
                <div class="col-md-12" id="overs">
                    Overs: 0.0
                </div>
                <div class="col-md-12" id="extras">
                    Extras: 0
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var totalBalls = 0;
        var balls = 0;
        var overs = 0;
        var teamRuns = 0;
        var firstPlayerRuns = 0;
        var secondPlayerRuns = 0;
        var extras = 0;
        var curPlayer = true;

        $('#one').on('click', function() {
            handleOddRun(1);
        });
        $('#two').on('click', function() {
            handleEvenRun(2);
        });
        $('#three').on('click', function() {
            handleOddRun(3);
        });
        $('#four').on('click', function() {
            handleEvenRun(4);
        });
        $('#five').on('click', function() {
            handleOddRun(5);
        });
        $('#six').on('click', function() {
            handleEvenRun(6);
        });

        $('#bowled').on('click', function() {
            handleOut('Bowled Out');
        });
        $('#runOut').on('click', function() {
            handleOut('Run Out');
        });
        $('#caught').on('click', function() {
            handleOut('Catch Out');
        });
        $('#stumps').on('click', function() {
            handleOut('Stumped');
        });
        $('#dottBall').on('click', handleDottBall);
        $('#wide').on('click', handleExtra);
        $('#noBall').on('click', handleExtra);
        $('#lbw').on('click', function() {
            handleOut('LBW');
        });

        function handleOddRun(runs) {

            totalBalls += 1;
            teamRuns += runs;
            overs = Math.floor(totalBalls / 6);
            balls = totalBalls % 6;
            if (curPlayer) {
                firstPlayerRuns += runs;
                $('#firstPlayer').text("Player 1: "+ firstPlayerRuns);
                $('#firstPlayer').css("color", "");
                $('#secondPlayer').css("color","green");
                if(totalBalls % 6 !== 0)
                {
                    curPlayer = !curPlayer;
                } else {
                    $('#secondPlayer').text("Player 2: "+ secondPlayerRuns);
                    $('#secondPlayer').css("color", "");
                    $('#firstPlayer').css("color","green");
                }
            } else {
                secondPlayerRuns += runs;
                $('#secondPlayer').text("Player 2: "+ secondPlayerRuns);
                $('#secondPlayer').css("color", "");
                $('#firstPlayer').css("color","green");
                if(totalBalls % 6 !== 0)
                {
                    curPlayer = !curPlayer;
                } else {
                    $('#firstPlayer').text("Player 1: "+ firstPlayerRuns);
                    $('#firstPlayer').css("color", "");
                    $('#secondPlayer').css("color","green");
                }
            }

            $('#teamRun').text("Team Run: " + teamRuns);
            $('#overs').text("Overs: "+ overs + "." + balls);
        }

        function handleEvenRun(runs) {
            totalBalls += 1;
            teamRuns += runs;
            overs = Math.floor(totalBalls / 6);
            balls = totalBalls % 6;
            if (curPlayer) {
                firstPlayerRuns += runs;
                $('#firstPlayer').text("Player 1: "+ firstPlayerRuns);
                if (totalBalls % 6 ===0 ){
                    curPlayer = !curPlayer;
                    $('#firstPlayer').css("color", "");
                    $('#secondPlayer').css("color","green");
                }

            } else {
                secondPlayerRuns += runs;
                $('#secondPlayer').text("Player 2: "+ secondPlayerRuns);
                if (totalBalls % 6 ===0 ){
                    curPlayer = !curPlayer;
                    $('#firstPlayer').css("color", "green");
                    $('#secondPlayer').css("color","");
                }
            }

            $('#teamRun').text("Team Run: " + teamRuns);
            $('#overs').text("Overs: "+ overs + "." + balls);
        }

        function handleDottBall() {
            swal({
                title: "<b class='btn btn-warning'>Dot Ball</b>",
                html: "A dot ball occurred as batsman wasn't ready.",
                confirmButtonText: "<u>Ok</u>",
            });
        }

        function handleExtra() {
            extras += 1;
            teamRuns += 1;
            $('#extras').text("Extras: "+ extras);
            $('#teamRun').text("Team Run: " + teamRuns);
        }

        function handleOut(type) {
            var player = "Player 1";
            if (!curPlayer) {
                player = "Player 2";
            }
            swal({
                title: "<b style='color: red'>Game Over. " + player + " has been " + type + ".</b>",
                html: $('#liveScoreArea').html(),
                confirmButtonText: "<u>Ok</u>",
            }).then(function () {
                window.location.reload();
            });
        }
    </script>
@endsection