@extends('layouts.master')

@section('style')
    <link rel="stylesheet" href="css/lity.min.css">
    <style>
        .resume-page {
            display: inline;
            margin-top: 20px;
        }
    </style>
@stop
@section('script')
    <script src="js/lity.min.js"></script>
@stop

@section('content')
    <div class="fluid-container">
        <div class="row even">
            <div class="section">
                <h1 class="text-center row-title">Resume</h1>
                <div class="spacer"></div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="resume/download"><h2 class="text-center"><i class="fa fa-download"></i> Download as PDF</h2></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-4">
                        <a class="pull-right" href="img/Thomas_Leu_Resume_pg1.png" data-lity><img class="resume-page" src="img/tn_Thomas_Leu_Resume_pg1.png"></a>
                    </div>
                    <div class="col-md-4">
                        <a href="img/Thomas_Leu_Resume_pg2.png" data-lity><img class="resume-page" src="img/tn_Thomas_Leu_Resume_pg2.png"></a>
                    </div>
                </div>
                <div class="spacer"></div>
            </div>
        </div>
    </div>
@stop